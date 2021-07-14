<?php

namespace App\Entity\Spec;

use App\Entity\Exception\InvalidTripStepException;
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
     * @param string    $transportNumber
     * @param string    $departure
     * @param string    $arrival
     * @param DateTime  $departureDatetime
     * @param DateTime  $arrivalDatetime
     * @param null|Trip $trip
     * @throws InvalidTripStepException
     */
    public function __construct(
        string $transportNumber,
        string $departure,
        string $arrival,
        DateTime $departureDatetime,
        DateTime $arrivalDatetime,
        ?Trip $trip = null
    ) {
        if (!$this->isValidTransportNumber($transportNumber)) {
            throw new InvalidTripStepException(1, 'Invalid transport number');
        }

        if (!$this->isValidDeparture($departure)) {
            throw new InvalidTripStepException(1, 'Invalid departure');
        }

        if (!$this->isValidArrival($arrival)) {
            throw new InvalidTripStepException(1, 'Invalid arrival');
        }

        $this->transportNumber = $transportNumber;
        $this->departure = $departure;
        $this->arrival = $arrival;
        $this->departureDatetime = $departureDatetime;
        $this->arrivalDatetime = $arrivalDatetime;
        $this->trip = $trip;
    }

    /**
     * @param Trip $trip
     * @return TripStep
     */
    abstract public function createTripStep(Trip $trip): TripStep;

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

    /**
     * @param string $transportNumber
     * @return bool
     */
    private function isValidTransportNumber(string $transportNumber): bool
    {
        $length = \strlen($transportNumber);

        return $length > 0 && $length < 256;
    }

    /**
     * @param string $departure
     * @return bool
     */
    private function isValidDeparture(string $departure): bool
    {
        $length = \strlen($departure);

        return $length > 0 && $length < 256;
    }

    /**
     * @param string $arrival
     * @return bool
     */
    private function isValidArrival(string $arrival): bool
    {
        $length = \strlen($arrival);

        return $length > 0 && $length < 256;
    }
}
