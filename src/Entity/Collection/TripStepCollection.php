<?php

namespace App\Entity\Collection;

use App\Entity\TripStep;
use App\Exception\InvalidArgumentException;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @package App\Entity\Collection
 */
class TripStepCollection extends ArrayCollection
{
    /**
     * @param array $elements
     * @throws InvalidArgumentException
     */
    public function __construct(array $elements = [])
    {
        if (empty($elements)) {
            throw new InvalidArgumentException(1, 'Expecting a non empty array');
        }

        foreach ($elements as $element) {
            if (!$element instanceof TripStep) {
                throw new InvalidArgumentException(
                    1,
                    \sprintf(
                        'Expecting an array of elements of type %s, got an element of type %s',
                        TripStep::class,
                        \is_object($element) ? \get_class($element) : \gettype($element)
                    )
                );
            }
        }

        parent::__construct($elements);
    }
}
