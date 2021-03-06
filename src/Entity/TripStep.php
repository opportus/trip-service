<?php

namespace App\Entity;

use App\Utils\UuidGenerator\UuidGenerator;
use App\Utils\UuidGenerator\UuidGeneratorException;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @package App\Entity
 * @ORM\MappedSuperclass()
 * @ORM\Table(indexes={
 *   @ORM\Index(columns={"type"}),
 *   @ORM\Index(columns={"departure"}),
 *   @ORM\Index(columns={"arrival"}),
 *   @ORM\Index(columns={"departure_datetime"}),
 *   @ORM\Index(columns={"arrival_datetime"})
 * })
 */
abstract class TripStep
{
    /**
     * @var string
     *
     * @ORM\Id()
     * @ORM\Column(length=36)
     */
    protected string $id;

    /**
     * @var string
     *
     * @ORM\Column(length=25)
     */
    protected string $type;

    /**
     * @var string
     *
     * @ORM\Column(length=256)
     */
    protected string $transportNumber;

    /**
     * @var string
     *
     * @ORM\Column(length=256)
     */
    protected string $departure;

    /**
     * @var string
     *
     * @ORM\Column(length=256)
     */
    protected string $arrival;

    /**
     * @var DateTime
     *
     * @ORM\Column()
     */
    protected DateTime $departureDatetime;

    /**
     * @var DateTime
     *
     * @ORM\Column()
     */
    protected DateTime $arrivalDatetime;

    /**
     * @var DateTime
     *
     * @ORM\Column()
     */
    protected DateTime $creationDatetime;

    /**
     * @var Trip
     *
     * @ORM\ManyToOne(targetEntity="Trip", inversedBy="steps")
     * @ORM\JoinColumn(nullable=false)
     */
    protected Trip $trip;

    /**
     * @throws UuidGeneratorException
     */
    public function __construct()
    {
        $this->id = UuidGenerator::generateUuid();
        $this->type = $this->getType();
        $this->creationDatetime = new DateTime();
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    abstract public function getType(): string;

    /**
     * @return string
     */
    public function getTransportNumber(): string
    {
        return $this->transportNumber;
    }

    /**
     * @return string
     */
    public function getDeparture(): string
    {
        return $this->departure;
    }

    /**
     * @return string
     */
    public function getArrival(): string
    {
        return $this->arrival;
    }

    /**
     * @return DateTime
     */
    public function getDepartureDatetime(): DateTime
    {
        return $this->departureDatetime;
    }

    /**
     * @return DateTime
     */
    public function getArrivalDatetime(): DateTime
    {
        return $this->arrivalDatetime;
    }

    /**
     * @return DateTime
     */
    public function getCreationDatetime(): DateTime
    {
        return $this->creationDatetime;
    }
}
