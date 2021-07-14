<?php

namespace App\Service\Message;

use App\Service\Message\Base\Query;
use App\Utils\UuidGenerator\UuidGeneratorException;

/**
 * @package App\Service\Message
 */
class GetTripQuery extends Query implements GetTripQueryInterface
{
    /**
     * @var string
     */
    private string $tripId;

    /**
     * @param string $tripId
     * @throws UuidGeneratorException
     */
    public function __construct(string $tripId)
    {
        parent::__construct();

        $this->tripId = $tripId;
    }

    /**
     * @inheritdoc
     */
    public function getTripId(): string
    {
        return $this->tripId;
    }
}
