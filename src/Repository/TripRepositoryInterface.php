<?php

namespace App\Repository;

use App\Entity\Trip;
use App\Repository\Exception\TripRepositoryException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepositoryInterface;
use Doctrine\Persistence\ObjectRepository;

/**
 * @package App\Repository
 */
interface TripRepositoryInterface extends ServiceEntityRepositoryInterface, ObjectRepository
{
    /**
     * @param string $id
     * @return null|Trip
     * @throws TripRepositoryException
     */
    public function get(string $id): ?Trip;

    /**
     * @param Trip[] $trips
     * @throws TripRepositoryException
     */
    public function save(array $trips);

    /**
     * @param Trip[] $trips
     * @throws TripRepositoryException
     */
    public function delete(array $trips);
}
