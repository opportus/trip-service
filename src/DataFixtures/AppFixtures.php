<?php

namespace App\DataFixtures;

use App\Entity\Spec\BusTripStepSpec;
use App\Entity\Spec\PlaneTripStepSpec;
use App\Entity\Spec\TrainTripStepSpec;
use App\Entity\Spec\TripSpec;
use App\Entity\Spec\TripStepSpecCollection;
use App\Service\Message\CreateTripCommand;
use App\Service\TripServiceInterface;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/**
 * @package App\DataFixtures
 */
class AppFixtures extends Fixture
{
    /**
     * @var TripServiceInterface
     */
    private TripServiceInterface $tripService;

    /**
     * @param TripServiceInterface $tripService
     */
    public function __construct(TripServiceInterface $tripService)
    {
        $this->tripService = $tripService;
    }

    /**
     * @inheritdoc
     */
    public function load(ObjectManager $manager)
    {
        $tripStepSpecs = [];

        $tripStepSpecs[] = new TrainTripStepSpec(
            'T2',
            'Montpellier',
            'Nîmes',
            new DateTime(),
            new DateTime(),
            '1A'
        );

        $tripStepSpecs[] = new TrainTripStepSpec(
            'T5',
            'Aix-en-Provence',
            'Nice',
            new DateTime(),
            new DateTime(),
            '1A'
        );

        $tripStepSpecs[] = new PlaneTripStepSpec(
            'T1',
            'Moscou',
            'Montpellier',
            new DateTime(),
            new DateTime(),
            '1A',
            'A1',
            'A'
        );

        $tripStepSpecs[] = new BusTripStepSpec(
            'T4',
            'Marseille',
            'Aix-en-Provence',
            new DateTime(),
            new DateTime(),
            '1A'
        );

        $tripStepSpecs[] = new TrainTripStepSpec(
            'T3',
            'Nîmes',
            'Marseille',
            new DateTime(),
            new DateTime(),
            '1A'
        );

        $tripSpec = new TripSpec(new TripStepSpecCollection($tripStepSpecs));

        $command = new CreateTripCommand($tripSpec);

        $this->tripService->createTrip($command);
    }
}
