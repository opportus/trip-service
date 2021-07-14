<?php

namespace App\Entity\Spec;

use App\Entity\Exception\InvalidTripStepException;
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
     * @throws InvalidTripStepException
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
        parent::__construct(
            $transportNumber,
            $departure,
            $arrival,
            $departureDatetime,
            $arrivalDatetime,
            $trip
        );

        $this->type = self::TYPE;
        $this->seat = $seat;
        $this->gate = $gate;
        $this->baggageDrop = $baggageDrop;
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

    /**
     * @param string $seat
     * @return bool
     */
    private function isValidSeat(string $seat): bool
    {
        $length = \strlen($seat);

        return $length > 0 && $length < 5;
    }

    /**
     * @param string $gate
     * @return bool
     */
    private function isValidGate(string $gate): bool
    {
        $length = \strlen($gate);

        return $length > 0 && $length < 5;
    }

    /**
     * @param string $baggageDrop
     * @return bool
     */
    private function isValidBaggageDrop(string $baggageDrop): bool
    {
        $length = \strlen($baggageDrop);

        return $length > 0 && $length < 5;
    }
}
