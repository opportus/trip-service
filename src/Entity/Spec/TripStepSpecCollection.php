<?php

namespace App\Entity\Spec;

use App\Exception\InvalidArgumentException;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @package App\Entity\Spec
 */
class TripStepSpecCollection extends ArrayCollection
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
            if (!$element instanceof TripStepSpec) {
                throw new InvalidArgumentException(
                    1,
                    \sprintf(
                        'Expecting an array of elements of type %s, got an element of type %s',
                        TripStepSpec::class,
                        \is_object($element) ? \get_class($element) : \gettype($element)
                    )
                );
            }
        }

        parent::__construct($elements);
    }
}
