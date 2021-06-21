<?php

namespace App\Entity;

use App\Entity\Spec\TripStepSpec;
use App\Exception\InvalidArgumentException;
use App\Utils\UuidGenerator\UuidGenerator;
use App\Utils\UuidGenerator\UuidGeneratorException;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\OrderBy({"number" = "ASC"})
     */
    private Collection $steps;

    /**
     * @param TripStepSpec[] $stepSpecs
     * @throws InvalidArgumentException
     * @throws UuidGeneratorException
     */
    public function __construct(array $stepSpecs)
    {
        $steps = [];

        if (empty($stepSpecs)) {
            throw new InvalidArgumentException(1, 'Expecting a non empty array');
        }

        foreach ($stepSpecs as $stepSpec) {
            if (!$stepSpec instanceof TripStepSpec) {
                throw new InvalidArgumentException(
                    1,
                    \sprintf(
                        'Expecting an array of elements of type %s, got an element of type %s',
                        TripStepSpec::class,
                        \is_object($stepSpec) ? \get_class($stepSpec) : \gettype($stepSpec)
                    )
                );
            }

            $step = $stepSpec->createTripStep($this);

            $steps[$step->getNumber()] = $step;
        }

        $this->id = UuidGenerator::generateUuid();
        $this->creationDatetime = new DateTime();
        $this->steps = new ArrayCollection($steps);
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
     * @return string[] an array of TripStep ID
     */
    public function getStepIds(): array
    {
        $steps = [];

        /** @var TripStep $step */
        foreach ($this->steps as $step) {
            $steps[$step->getNumber()] = $step->getId();
        }

        return $steps;
    }
}
