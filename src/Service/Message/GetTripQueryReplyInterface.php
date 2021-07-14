<?php

namespace App\Service\Message;

use App\Entity\Trip;
use App\Service\Message\Base\QueryReplyInterface;

/**
 * @package App\Service\Message
 */
interface GetTripQueryReplyInterface extends QueryReplyInterface
{
    /**
     * @return null|Trip
     */
    public function getTrip(): ?Trip;
}
