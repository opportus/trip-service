<?php

namespace App\Service;

use App\Service\Exception\TripServiceException;
use App\Service\Message\CreateTripCommandInterface;
use App\Service\Message\CreateTripCommandReplyInterface;
use App\Service\Message\GetTripQueryInterface;
use App\Service\Message\GetTripQueryReplyInterface;

/**
 * @package App\Service
 */
interface TripServiceInterface
{
    /**
     * @param GetTripQueryInterface $query
     * @return GetTripQueryReplyInterface
     * @throws TripServiceException
     */
    public function getTrip(GetTripQueryInterface $query): GetTripQueryReplyInterface;

    /**
     * @param CreateTripCommandInterface $command
     * @return CreateTripCommandReplyInterface
     * @throws TripServiceException
     */
    public function createTrip(CreateTripCommandInterface $command): CreateTripCommandReplyInterface;
}
