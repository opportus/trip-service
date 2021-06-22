<?php

namespace App\Entity;

use App\Entity\Spec\PlaneTripStepSpec;
use App\Exception\InvalidArgumentException;
use App\Utils\UuidGenerator\UuidGeneratorException;
use Doctrine\ORM\Mapping as ORM;

/**
 * @package App\Entity
 *
 * @ORM\Entity()
 */
class PlaneTripStep extends TripStep
{
    /**
     * @var string
     *
     * @ORM\Column(length=5)
     */
    private string $seat;

    /**
     * @var string
     *
     * @ORM\Column(length=5)
     */
    private string $gate;

    /**
     * @var string
     *
     * @ORM\Column(length=5)
     */
    private string $baggageDrop;

    /**
     * @param PlaneTripStepSpec $spec
     * @throws UuidGeneratorException
     * @throws InvalidArgumentException
     */
    public function __construct(PlaneTripStepSpec $spec)
    {
        parent::__construct();

        if (null === $spec->getTrip()) {
            throw new InvalidArgumentException(
                1,
                \sprintf(
                    'Expecting an instance of %s in %s, got null',
                    Trip::class,
                    PlaneTripStepSpec::class
                )
            );
        }

        $this->transportNumber = $spec->getTransportNumber();
        $this->departure = $spec->getDeparture();
        $this->arrival = $spec->getArrival();
        $this->departureDatetime = $spec->getDepartureDatetime();
        $this->arrivalDatetime = $spec->getArrivalDatetime();
        $this->seat = $spec->getSeat();
        $this->gate = $spec->getGate();
        $this->baggageDrop = $spec->getBaggageDrop();
        $this->trip = $spec->getTrip();
    }

    /**
     * @inheritdoc
     */
    public function getType(): string
    {
        return 'plane';
    }

    /**
     * @return string
     */
    public function getSeat(): string
    {
        return $this->seat;
    }

    /**
     * @return string
     */
    public function getGate(): string
    {
        return $this->gate;
    }

    /**
     * @return string
     */
    public function getBaggageDrop(): string
    {
        return $this->baggageDrop;
    }
}
