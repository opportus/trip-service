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
     * @var int
     */
    protected int $number;

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
     * @param int      $number
     * @param string   $transportNumber
     * @param string   $departure
     * @param string   $arrival
     * @param DateTime $departureDatetime
     * @param DateTime $arrivalDatetime
     */
    public function __construct(
        int $number,
        string $transportNumber,
        string $departure,
        string $arrival,
        DateTime $departureDatetime,
        DateTime $arrivalDatetime
    ) {
        $this->type = $this->getType();
        $this->number = $number;
        $this->transportNumber = $transportNumber;
        $this->departure = $departure;
        $this->arrival = $arrival;
        $this->departureDatetime = $departureDatetime;
        $this->arrivalDatetime = $arrivalDatetime;
    }

    /**
     * @param Trip $trip
     * @return TripStep
     */
    abstract public function createTripStep(Trip $trip): TripStep;

    /**
     * @return string
     */
    abstract public function getType(): string;

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
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
}
