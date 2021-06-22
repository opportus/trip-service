<?php

namespace App\Entity\Spec;

use App\Entity\Trip;
use App\Utils\UuidGenerator\UuidGeneratorException;

/**
 * @package App\Entity\Spec
 */
class TripSpec
{
    /**
     * @var TripStepSpecCollection
     */
    private TripStepSpecCollection $stepSpecs;

    public function __construct(TripStepSpecCollection  $stepSpecs)
    {
        $this->stepSpecs = $stepSpecs;
    }

    /**
     * @return TripStepSpecCollection
     */
    public function getStepSpecs(): TripStepSpecCollection
    {
        return $this->stepSpecs;
    }

    /**
     * @return Trip
     * @throws UuidGeneratorException
     */
    public function create(): Trip
    {
        return new Trip($this);
    }
}
