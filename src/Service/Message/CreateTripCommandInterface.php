<?php

namespace App\Service\Message;

use App\Entity\Spec\TripSpec;
use App\Service\Message\Base\CommandInterface;

/**
 * @package App\Service\Message
 */
interface CreateTripCommandInterface extends CommandInterface
{
    /**
     * @return TripSpec
     */
    public function getTripSpec(): TripSpec;
}
