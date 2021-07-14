<?php

namespace App\Service\Message;

use App\Service\Message\Base\QueryInterface;

/**
 * @package App\Service\Message
 */
interface GetTripQueryInterface extends QueryInterface
{
    /**
     * @return string
     */
    public function getTripId(): string;
}
