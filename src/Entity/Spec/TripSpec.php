<?php

namespace App\Entity\Spec;

use App\Entity\Exception\InvalidTripException;
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

    /**
     * @param TripStepSpecCollection $stepSpecs
     * @throws InvalidTripException
     */
    public function __construct(TripStepSpecCollection $stepSpecs)
    {
        if ($this->areThereStepsSharingSameDepartureOrArrival($stepSpecs)) {
            throw new InvalidTripException(1, 'It is not possible to pass twice in the same city');
        }

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
    public function createTrip(): Trip
    {
        return new Trip($this);
    }


    /**
     * @param TripStepSpecCollection $stepSpecs
     * @return bool
     */
    private function areThereStepsSharingSameDepartureOrArrival(TripStepSpecCollection $stepSpecs): bool
    {
        $departures = [];
        $arrivals = [];

        /** @var TripStepSpec $stepSpec */
        foreach ($stepSpecs as $stepSpec) {
            $departures[$stepSpec->getDeparture()] = null;
            $arrivals[$stepSpec->getArrival()] = null;
        }

        if (\count($stepSpecs) !== \count($departures) || \count($stepSpecs) !== \count($arrivals)) {
            return true;
        }

        return false;
    }
}
