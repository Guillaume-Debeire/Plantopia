<?php

namespace App\Entity;

use App\Repository\PlantRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Ignore;

/**
 * @ORM\Entity(repositoryClass=PlantRepository::class)
 */
class Plant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $specification;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $age;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $initialization_date;

    /**
     * @ORM\Column(type="object", nullable=true)
     */
    private $watering;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $light;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $cut;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $fertilization;

    /**
     * @ORM\Column(type="array", length=255, nullable=true)
     */
    private $repotting;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;

    /**
     * @ORM\ManyToOne(targetEntity=CalendarSchedule::class, inversedBy="plant")
     * @Ignore()
     */
    private $calendarSchedule;

    /**
     * @ORM\ManyToOne(targetEntity=Type::class, inversedBy="plants")
     * @Ignore()
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=Skill::class, inversedBy="plants")
     * @Ignore()
     */
    private $skill;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $slug;

    public function __construct()
    {
        $this->created_at = new \DateTime();
    }

    public function __toInteger()
    {
        return $this->watering;
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSpecification(): ?string
    {
        return $this->specification;
    }

    public function setSpecification(?string $specification): self
    {
        $this->specification = $specification;

        return $this;
    }

    public function getAge(): ?\DateTimeInterface
    {
        return $this->age;
    }

    public function setAge(?\DateTimeInterface $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getInitializationDate(): ?\DateTimeInterface
    {
        return $this->initialization_date;
    }

    public function setInitializationDate(?\DateTimeInterface $initialization_date): self
    {
        $this->initialization_date = $initialization_date;

        return $this;
    }

    public function getWatering(): ?object
    {
        return $this->watering;
    }

    public function setWatering(?object $watering): self
    {
        $this->watering = $watering;

        return $this;
    }

    public function getLight(): ?string
    {
        return $this->light;
    }

    public function setLight(?string $light): self
    {
        $this->light = $light;

        return $this;
    }

    public function getCut(): ?array
    {
        return $this->cut;
    }

    public function setCut(?array $cut): self
    {
        $this->cut = $cut;

        return $this;
    }

    public function getFertilization(): ?array
    {
        return $this->fertilization;
    }

    public function setFertilization(?array $fertilization): self
    {
        $this->fertilization = $fertilization;

        return $this;
    }

    public function getRepotting(): ?array
    {
        return $this->repotting;
    }

    public function setRepotting(?array $repotting): self
    {
        $this->repotting = $repotting;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture ?? "plant-groot.jpg";
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getCalendarSchedule(): ?CalendarSchedule
    {
        return $this->calendarSchedule;
    }

    public function setCalendarSchedule(?CalendarSchedule $calendarSchedule): self
    {
        $this->calendarSchedule = $calendarSchedule;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getSkill(): ?Skill
    {
        return $this->skill;
    }

    public function setSkill(?Skill $skill): self
    {
        $this->skill = $skill;

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }
    
}
