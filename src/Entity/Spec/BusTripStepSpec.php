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
     * @inheritdoc
     *
     * @param string $seat
     */
    public function __construct(
        int $number,
        string $transportNumber,
        string $departure,
        string $arrival,
        DateTime $departureDatetime,
        DateTime $arrivalDatetime,
        string $seat = ''
    ) {
        parent::__construct(
            $number,
            $transportNumber,
            $departure,
            $arrival,
            $departureDatetime,
            $arrivalDatetime
        );

        $this->seat = $seat;
    }

    /**
     * @inheritdoc
     */
    public function createTripStep(Trip $trip): BusTripStep
    {
        return new BusTripStep(
            $trip,
            $this->number,
            $this->transportNumber,
            $this->departure,
            $this->arrival,
            $this->departureDatetime,
            $this->arrivalDatetime,
            $this->seat
        );
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
