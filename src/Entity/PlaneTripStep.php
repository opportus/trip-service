<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @package App\Entity
 *
 * @ORM\Entity()
 */
class PlaneTripStep extends TripStep
{
    /**
     * @var string
     *
     * @ORM\Column(length=5)
     */
    private string $seat;

    /**
     * @var string
     *
     * @ORM\Column(length=5)
     */
    private string $gate;

    /**
     * @var string
     *
     * @ORM\Column(length=5)
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
        Trip $trip,
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
            $trip,
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
