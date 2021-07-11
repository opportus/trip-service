<?php

namespace App\Entity\Spec;

use App\Entity\Trip;
use App\Entity\TripStep;
use DateTime;

/**
 * @package App\Entity\Spec
 */
abstract class TripStepSpec
{
    /**
     * @var string
     */
    protected string $type;

    /**
     * @var string
     */
    protected string $transportNumber;

    /**
     * @var string
     */
    protected string $departure;

    /**
     * @var string
     */
    protected string $arrival;

    /**
     * @var DateTime
     */
    protected DateTime $departureDatetime;

    /**
     * @var DateTime
     */
    protected DateTime $arrivalDatetime;

    /**
     * @var null|Trip
     */
    protected ?Trip $trip;

    /**
     * @param Trip $trip
     * @return TripStep
     */
    abstract public function create(Trip $trip): TripStep;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getTransportNumber(): string
    {
        return $this->transportNumber;
    }

    /**
     * @return string
     */
    public function getDeparture(): string
    {
        return $this->departure;
    }

    /**
     * @return string
     */
    public function getArrival(): string
    {
        return $this->arrival;
    }

    /**
     * @return DateTime
     */
    public function getDepartureDatetime(): DateTime
    {
        return $this->departureDatetime;
    }

    /**
     * @return DateTime
     */
    public function getArrivalDatetime(): DateTime
    {
        return $this->arrivalDatetime;
    }

    /**
     * @return null|Trip
     */
    public function getTrip(): ?Trip
    {
        return $this->trip;
    }
}
