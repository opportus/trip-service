<?php

namespace App\Service\Message;

use App\Entity\Trip;
use App\Service\Message\Base\QueryReply;
use App\Utils\UuidGenerator\UuidGeneratorException;

/**
 * @package App\Service\Message
 */
class GetTripQueryReply extends QueryReply implements GetTripQueryReplyInterface
{
    /**
     * @var null|Trip
     */
    private ?Trip $trip;

    /**
     * @param GetTripQueryInterface $message
     * @param null|Trip             $trip
     * @throws UuidGeneratorException
     */
    public function __construct(GetTripQueryInterface $message, ?Trip $trip)
    {
        parent::__construct($message);

        $this->trip = $trip;
    }

    /**
     * @inheritdoc
     */
    public function getTrip(): ?Trip
    {
        return $this->trip;
    }
}
