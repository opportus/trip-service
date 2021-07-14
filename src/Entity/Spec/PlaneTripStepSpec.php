<?php

namespace App\Entity\Spec;

use App\Entity\PlaneTripStep;
use App\Entity\Trip;
use DateTime;

/**
 * @package App\Entity\Spec
 */
class PlaneTripStepSpec extends TripStepSpec
{
    private const TYPE = 'plane';

    /**
     * @var string
     */
    private string $seat;

    /**
     * @var string
     */
    private string $gate;

    /**
     * @var string
     */
    private string $baggageDrop;

    /**
     * @param string    $transportNumber
     * @param string    $departure
     * @param string    $arrival
     * @param DateTime  $departureDatetime
     * @param DateTime  $arrivalDatetime
     * @param string    $seat
     * @param string    $gate
     * @param string    $baggageDrop
     * @param null|Trip $trip
     */
    public function __construct(
        string $transportNumber,
        string $departure,
        string $arrival,
        DateTime $departureDatetime,
        DateTime $arrivalDatetime,
        string $seat = '',
        string $gate = '',
        string $baggageDrop = '',
        ?Trip $trip = null
    ) {
        $this->type = self::TYPE;
        $this->transportNumber = $transportNumber;
        $this->departure = $departure;
        $this->arrival = $arrival;
        $this->departureDatetime = $departureDatetime;
        $this->arrivalDatetime = $arrivalDatetime;
        $this->seat = $seat;
        $this->gate = $gate;
        $this->baggageDrop = $baggageDrop;
        $this->trip = $trip;
    }

    /**
     * @inheritdoc
     */
    public function createTripStep(Trip $trip): PlaneTripStep
    {
        return new PlaneTripStep(new self(
            $this->transportNumber,
            $this->departure,
            $this->arrival,
            $this->departureDatetime,
            $this->arrivalDatetime,
            $this->seat,
            $this->gate,
            $this->baggageDrop,
            $trip
        ));
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
