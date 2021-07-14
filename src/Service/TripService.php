<?php

namespace App\Service;

use App\Entity\Collection\TripCollection;
use App\Entity\Trip;
use App\Repository\TripRepositoryInterface;
use App\Service\Exception\TripServiceException;
use App\Service\Message\CreateTripCommandInterface;
use App\Service\Message\CreateTripCommandReply;
use App\Service\Message\CreateTripCommandReplyInterface;
use App\Service\Message\GetTripQueryInterface;
use App\Service\Message\GetTripQueryReply;
use App\Service\Message\GetTripQueryReplyInterface;
use Exception;

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
        try {
            /** @var Trip $trip */
            $trip = $this->repository->get($query->getTripId());

            return new GetTripQueryReply($query, $trip);

        } catch (Exception $e) {
            throw new TripServiceException(
                $e->getMessage(),
                $e->getCode(),
                $e
            );
        }
    }

    /**
     * @inheritdoc
     */
    public function createTrip(CreateTripCommandInterface $command): CreateTripCommandReplyInterface
    {
        try {
            $tripSpec = $command->getTripSpec();

            $trip = $tripSpec->createTrip();

            $this->repository->save(new TripCollection([$trip]));

            return new CreateTripCommandReply($command, $trip);

        } catch (Exception $e) {
            throw new TripServiceException(
                $e->getMessage(),
                $e->getCode(),
                $e
            );
        }
    }
}
