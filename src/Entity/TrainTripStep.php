<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @package App\Entity
 *
 * @ORM\Entity()
 */
class TrainTripStep extends TripStep
{
    /**
     * @var string
     *
     * @ORM\Column(length=5)
     */
    private string $seat;

    /**
     * @inheritdoc
     *
     * @param string $seat
     */
    public function __construct(
        Trip $trip,
        int $number,
        string $transportNumber,
        string $departure,
        string $arrival,
        DateTime $departureDatetime,
        DateTime $arrivalDatetime,
        string $seat = ''
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
    }

    /**
     * @inheritdoc
     */
    public function getType(): string
    {
        return 'train';
    }

    /**
     * @return string
     */
    public function getSeat(): string
    {
        return $this->seat;
    }
}
