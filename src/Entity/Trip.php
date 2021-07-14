<?php

namespace App\Entity;

use App\Entity\Exception\InvalidTrip;
use App\Entity\Spec\TripSpec;
use App\Entity\Spec\TripStepSpec;
use App\Utils\UuidGenerator\UuidGenerator;
use App\Utils\UuidGenerator\UuidGeneratorException;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use SplDoublyLinkedList;

/**
 * The domain aggregate root.
 *
 * @package App\Entity
 *
 * @ORM\Entity()
 */
class Trip
{
    /**
     * @var string
     *
     * @ORM\Id()
     * @ORM\Column(length=36)
     */
    private string $id;

    /**
     * @var DateTime
     *
     * @ORM\Column()
     */
    private DateTime $creationDatetime;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="TripStep", mappedBy="trip", cascade={"all"})
     */
    private Collection $steps;

    /**
     * @param TripSpec $spec
     * @throws UuidGeneratorException
     * @throws InvalidTrip
     */
    public function __construct(TripSpec $spec)
    {
        $steps = [];

        /** @var TripStepSpec $stepSpec */
        foreach ($spec->getStepSpecs() as $stepSpec) {
            $steps[] = $stepSpec->createTripStep($this);
        }

        $steps = new ArrayCollection($steps);

        $this->id = UuidGenerator::generateUuid();
        $this->creationDatetime = new DateTime();
        $this->steps = $steps;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return DateTime
     */
    public function getCreationDatetime(): DateTime
    {
        return $this->creationDatetime;
    }

    /**
     * Read only VO Steps, so we can pass them to the aggregate's client relatively safely (enough for a test api)...
     *
     * @return array
     */
    public function getSteps(): array
    {
        return iterator_to_array($this->buildLinkedStepList($this->steps->toArray()));
    }

    /**
     * @todo Walk list seeking in both directions...
     *
     * @param array  $list
     * @return SplDoublyLinkedList
     */
    private function buildLinkedStepList(array $list): SplDoublyLinkedList
    {
        $direction = true;
        $linkedList = new SplDoublyLinkedList();
        $currentNodeListKey = \array_key_first($list);

        while (!empty($list)) {
            if (!isset($currentNodeListKey)) {
                $currentNode = $linkedList->{$this->getUnlinkOperation($direction)}();
            } else {
                $currentNode = $list[$currentNodeListKey];
                unset($list[$currentNodeListKey]);
            }

            $linkedList->{$this->getLinkOperation($direction)}($currentNode);

            $currentNodeListKey = $this->findLinkedNodeKey($list, $currentNode, $direction);

            if (!isset($currentNodeListKey)) {
                $direction = !$direction;
            }
        }

        $linkedList->rewind();

        return $linkedList;
    }

    /**
     * @param array  $list
     * @param array  $currentNode
     * @param bool   $direction
     * @return null|int
     */
    private function findLinkedNodeKey(array $list, array $currentNode, bool $direction): ?int
    {
        $links = ['departure', 'arrival'];

        foreach ($list as $key => $node) {
            if ($currentNode[$links[$direction]] === $node[$links[!$direction]]) {
                return $key;
            }
        }

        return null;
    }

    /**
     * @param bool $direction
     * @return string
     */
    private function getLinkOperation(bool $direction): string
    {
        return $direction ? 'unshift' : 'push';
    }

    /**
     * @param bool $direction
     * @return string
     */
    private function getUnlinkOperation(bool $direction): string
    {
        return $direction ? 'shift' : 'pop';
    }
}
