<?php

namespace App\Entity\Spec;

use App\Entity\BusTripStep;
use App\Entity\Exception\InvalidTripStepException;
use App\Entity\Trip;
use DateTime;

/**
 * @package App\Entity
 */
class BusTripStepSpec extends TripStepSpec
{
    private const TYPE = 'bus';

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
     * @throws InvalidTripStepException
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

    /**
     * @param string $seat
     * @return bool
     */
    private function isValidSeat(string $seat): bool
    {
        $length = \strlen($seat);

        return $length > 0 && $length < 5;
    }
}
