<?php

namespace App\Repository;

use App\Entity\Trip;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepositoryInterface;
use Doctrine\Persistence\ObjectRepository;

/**
 * @package App\Repository
 */
interface TripRepositoryInterface extends ServiceEntityRepositoryInterface, ObjectRepository
{
    /**
     * @param Trip[] $trips
     */
    public function save(array $trips);

    /**
     * @param Trip[] $trips
     */
    public function delete(array $trips);
}
