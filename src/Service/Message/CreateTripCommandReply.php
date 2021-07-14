<?php

namespace App\Service\Message;

use App\Entity\Trip;
use App\Utils\UuidGenerator\UuidGeneratorException;

/**
 * @package App\Service\Message
 */
class CreateTripCommandReply extends Base\CommandReply implements CreateTripCommandReplyInterface
{
    /**
     * @var null|Trip
     */
    private ?Trip $trip;

    /**
     * @param CreateTripCommand $command
     * @param Trip              $trip
     * @throws UuidGeneratorException
     */
    public function __construct(CreateTripCommand $command, Trip $trip)
    {
        parent::__construct($command);

        $this->trip = $trip;
    }

    /**
     * @inheritDoc
     */
    public function getTrip(): ?Trip
    {
        return $this->trip;
    }
}
