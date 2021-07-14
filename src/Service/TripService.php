<?php

namespace App\Service;

use App\Entity\Trip;
use App\Repository\TripRepositoryInterface;
use App\Service\Message\CreateTripCommandInterface;
use App\Service\Message\CreateTripCommandReply;
use App\Service\Message\CreateTripCommandReplyInterface;
use App\Service\Message\GetTripQueryInterface;
use App\Service\Message\GetTripQueryReply;
use App\Service\Message\GetTripQueryReplyInterface;

/**
 * @package App\Service
 */
class TripService implements TripServiceInterface
{
    /**
     * @var TripRepositoryInterface
     */
    private TripRepositoryInterface $repository;

    /**
     * @param TripRepositoryInterface $repository
     */
    public function __construct(TripRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @inheritdoc
     */
    public function getTrip(GetTripQueryInterface $query): GetTripQueryReplyInterface
    {
        /** @var Trip $trip */
        $trip = $this->repository->find($query->getTripId());

        return new GetTripQueryReply($query, $trip);
    }

    /**
     * @inheritdoc
     */
    public function createTrip(CreateTripCommandInterface $command): CreateTripCommandReplyInterface
    {
        $tripSpec = $command->getTripSpec();

        $trip = $tripSpec->createTrip();

        $this->repository->save([$trip]);

        return new CreateTripCommandReply($command, $trip);
    }
}
