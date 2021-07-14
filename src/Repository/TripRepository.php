<?php

namespace App\Repository;

use App\Entity\Trip;
use App\Repository\Exception\TripRepositoryException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Exception;

/**
 * @package App\Repository
 */
class TripRepository extends ServiceEntityRepository implements TripRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Trip::class);

    }

    /**
     * @inheritDoc
     */
    public function get(string $id): ?Trip
    {
        try {
            return $this->find($id);

        } catch (Exception $e) {
            throw new TripRepositoryException(
                $e->getMessage(),
                $e->getCode(),
                $e
            );
        }
    }

    /**
     * @inheritDoc
     */
    public function save(array $trips)
    {
        try {
            foreach ($trips as $trip) {
                $this->getEntityManager()->persist($trip);
            }

            $this->getEntityManager()->flush();

        } catch (Exception $e) {
            throw new TripRepositoryException(
                $e->getMessage(),
                $e->getCode(),
                $e
            );
        }
    }

    /**
     * @inheritDoc
     */
    public function delete(array $trips)
    {
        try {
            foreach ($trips as $trip) {
                $this->getEntityManager()->remove($trip);
            }

            $this->getEntityManager()->flush();

        } catch (Exception $e) {
            throw new TripRepositoryException(
                $e->getMessage(),
                $e->getCode(),
                $e
            );
        }
    }
}
