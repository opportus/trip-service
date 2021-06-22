<?php

namespace App\Entity;

use App\Entity\Spec\BusTripStepSpec;
use App\Exception\InvalidArgumentException;
use App\Utils\UuidGenerator\UuidGeneratorException;
use Doctrine\ORM\Mapping as ORM;

/**
 * @package App\Entity
 *
 * @ORM\Entity()
 */
class BusTripStep extends TripStep
{
    /**
     * @var string
     *
     * @ORM\Column(length=5)
     */
    private string $seat;

    /**
     * @param BusTripStepSpec $spec
     * @throws UuidGeneratorException
     * @throws InvalidArgumentException
     */
    public function __construct(BusTripStepSpec $spec)
    {
        parent::__construct();

        if (null === $spec->getTrip()) {
            throw new InvalidArgumentException(
                1,
                \sprintf(
                    'Expecting an instance of %s in %s, got null',
                    Trip::class,
                    BusTripStepSpec::class
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
        return 'bus';
    }

    /**
     * @return string
     */
    public function getSeat(): string
    {
        return $this->seat;
    }
}
