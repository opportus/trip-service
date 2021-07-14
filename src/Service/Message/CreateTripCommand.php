<?php

namespace App\Service\Message;

use App\Entity\Spec\TripSpec;
use App\Service\Message\Base\Command;
use App\Utils\UuidGenerator\UuidGeneratorException;

/**
 * @package App\Service\Message
 */
class CreateTripCommand extends Command implements CreateTripCommandInterface
{
    private TripSpec $tripSpec;

    /**
     * @param TripSpec $tripSpec
     * @throws UuidGeneratorException
     */
    public function __construct(TripSpec $tripSpec)
    {
        parent::__construct();

        $this->tripSpec = $tripSpec;
    }

    /**
     * @inheritDoc
     */
    public function getTripSpec(): TripSpec
    {
        return $this->tripSpec;
    }
}
