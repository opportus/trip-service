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
     * @inheritdoc
     *
     * @param string $seat
     * @param string $gate
     * @param string $baggageDrop
     */
    public function __construct(
        int $number,
        string $transportNumber,
        string $departure,
        string $arrival,
        DateTime $departureDatetime,
        DateTime $arrivalDatetime,
        string $seat = '',
        string $gate = '',
        string $baggageDrop = ''
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
        $this->gate = $gate;
        $this->baggageDrop = $baggageDrop;
    }

    /**
     * @inheritdoc
     */
    public function createTripStep(Trip $trip): PlaneTripStep
    {
        return new PlaneTripStep(
            $trip,
            $this->number,
            $this->transportNumber,
            $this->departure,
            $this->arrival,
            $this->departureDatetime,
            $this->arrivalDatetime,
            $this->seat,
            $this->gate,
            $this->baggageDrop
        );
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
