<?php

namespace App\Service;

use App\Entity\Spec\TripStepSpecCollection;
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
     */
    public function getTrip(GetTripQueryInterface $query): GetTripQueryReplyInterface;

    /**
     * @param CreateTripCommandInterface $command
     * @return CreateTripCommandReplyInterface
     */
    public function createTrip(CreateTripCommandInterface $command): CreateTripCommandReplyInterface;
}
