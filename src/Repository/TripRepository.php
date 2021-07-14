<?php

namespace App\Repository;

use App\Entity\Trip;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

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
    public function save(array $trips)
    {
        foreach ($trips as $trip) {
            $this->getEntityManager()->persist($trip);
        }

        $this->getEntityManager()->flush();
    }

    /**
     * @inheritDoc
     */
    public function delete(array $trips)
    {
        foreach ($trips as $trip) {
            $this->getEntityManager()->remove($trip);
        }

        $this->getEntityManager()->flush();
    }
}
