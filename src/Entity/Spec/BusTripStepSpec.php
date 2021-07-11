<?php

namespace App\Entity\Spec;

use App\Entity\BusTripStep;
use App\Entity\Trip;
use DateTime;

/**
 * @package App\Entity
 */
class BusTripStepSpec extends TripStepSpec
{
    /**
     * @var string
     */
    private string $seat;

    /**
     * @param string    $transportNumber
     * @param string    $departure
     * @param string    $arrival
     * @param DateTime  $departureDatetime
     * @param DateTime  $arrivalDatetime
     * @param string    $seat
     * @param null|Trip $trip
     */
    public function __construct(
        string $transportNumber,
        string $departure,
        string $arrival,
        DateTime $departureDatetime,
        DateTime $arrivalDatetime,
        string $seat = '',
        ?Trip $trip = null
    ) {
        $this->type = 'bus';
        $this->transportNumber = $transportNumber;
        $this->departure = $departure;
        $this->arrival = $arrival;
        $this->departureDatetime = $departureDatetime;
        $this->arrivalDatetime = $arrivalDatetime;
        $this->seat = $seat;
        $this->trip = $trip;
    }

    /**
     * @inheritdoc
     */
    public function createTripStep(Trip $trip): BusTripStep
    {
        return new BusTripStep(new self(
            $this->transportNumber,
            $this->departure,
            $this->arrival,
            $this->departureDatetime,
            $this->arrivalDatetime,
            $this->seat,
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
}
