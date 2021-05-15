<?php

namespace App\Entity;

use App\Repository\CalendarScheduleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CalendarScheduleRepository::class)
 */
class CalendarSchedule
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="calendarSchedule")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Plant::class, mappedBy="calendarSchedule")
     */
    private $plant;

    public function __construct()
    {
        $this->plant = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Plant[]
     */
    public function getPlant(): Collection
    {
        return $this->plant;
    }

    public function addPlant(Plant $plant): self
    {
        if (!$this->plant->contains($plant)) {
            $this->plant[] = $plant;
            $plant->setCalendarSchedule($this);
        }

        return $this;
    }

    public function removePlant(Plant $plant): self
    {
        if ($this->plant->removeElement($plant)) {
            // set the owning side to null (unless already changed)
            if ($plant->getCalendarSchedule() === $this) {
                $plant->setCalendarSchedule(null);
            }
        }

        return $this;
    }

    // public function __toString()
    // {
    //     return $this->plant;
    // }
}
