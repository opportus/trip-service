<?php

namespace App\Entity;

use App\Entity\Spec\TrainTripStepSpec;
use App\Exception\InvalidArgumentException;
use App\Utils\UuidGenerator\UuidGeneratorException;
use Doctrine\ORM\Mapping as ORM;

/**
 * @package App\Entity
 *
 * @ORM\Entity()
 */
class TrainTripStep extends TripStep
{
    /**
     * @var string
     *
     * @ORM\Column(length=5)
     */
    private string $seat;

    /**
     * @param TrainTripStepSpec $spec
     * @throws UuidGeneratorException
     * @throws InvalidArgumentException
     */
    public function __construct(TrainTripStepSpec $spec)
    {
        parent::__construct();

        if (null === $spec->getTrip()) {
            throw new InvalidArgumentException(
                1,
                \sprintf(
                    'Expecting an instance of %s in %s, got null',
                    Trip::class,
                    TrainTripStepSpec::class
                )
            );
        }

        $this->transportNumber = $spec->getTransportNumber();
        $this->departure = $spec->getDeparture();
        $this->arrival = $spec->getArrival();
        $this->departureDatetime = $spec->getDepartureDatetime();
        $this->arrivalDatetime = $spec->getArrivalDatetime();
        $this->seat = $spec->getSeat();
        $this->trip = $spec->getTrip();
    }

    /**
     * @inheritdoc
     */
    public function getType(): string
    {
        return 'train';
    }

    /**
     * @return string
     */
    public function getSeat(): string
    {
        return $this->seat;
    }
}
