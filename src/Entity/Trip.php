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

        if ($this->areThereStepsSharingSameDepartureOrArrival($steps)) {
            throw new InvalidTrip(1, 'It is not possible to pass twice in the same city');
        }

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
     * @return string[] an array of TripStep ID
     */
    public function getStepIds(): array
    {
        $steps = [];

        /** @var TripStep $step */
        foreach ($this->steps as $step) {
            $steps[] = $step->getId();
        }

        return $steps;
    }

    /**
     * @param ArrayCollection $steps
     * @return bool
     */
    private function areThereStepsSharingSameDepartureOrArrival(ArrayCollection $steps): bool
    {
        $departures = [];
        $arrivals = [];

        /** @var TripStep $step */
        foreach ($steps as $step) {
            $departures[$step->getDeparture()] = null;
            $arrivals[$step->getArrival()] = null;
        }

        if (\count($steps) !== \count($departures) || \count($steps) !== \count($arrivals)) {
            return true;
        }

        return false;
    }
}
