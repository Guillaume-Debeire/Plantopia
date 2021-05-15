<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Ignore;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
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
    private $pseudo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $avatar;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;

    /**
     * @ORM\OneToMany(targetEntity=CalendarSchedule::class, mappedBy="user")
     * @Ignore()
     */
    private $calendarSchedule;

    /**
     * @ORM\ManyToOne(targetEntity=Role::class, inversedBy="users")
     * @ORM\JoinColumn(nullable=true)
     * @Ignore
     */
    private $role;

    public function __construct()
    {
        $this->created_at = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(?string $avatar): self
    {
        $this->avatar = $avatar;

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

    // public function getCalendarSchedule(): ?CalendarSchedule
    // {
    //     return $this->calendarSchedule;
    // }

    // public function setCalendarSchedule(?CalendarSchedule $calendarSchedule): self
    // {
    //     // unset the owning side of the relation if necessary
    //     if ($calendarSchedule === null && $this->calendarSchedule !== null) {
    //         $this->calendarSchedule->setUser(null);
    //     }

    //     // set the owning side of the relation if necessary
    //     if ($calendarSchedule !== null && $calendarSchedule->getUser() !== $this) {
    //         $calendarSchedule->setUser($this);
    //     }

    //     $this->calendarSchedule = $calendarSchedule;

    //     return $this;
    // }

    /**
     * @return Collection|CalendarSchedule[]
     */
    public function getCalendarSchedule(): Collection
    {
        return $this->calendarSchedule;
    }

    public function addCalendarSchedule(CalendarSchedule $calendarSchedule): self
    {
        if (!$this->calendarSchedule->contains($calendarSchedule)) {
            $this->calendarSchedule[] = $calendarSchedule;
            $calendarSchedule->setUser($this);
        }

        return $this;
    }

    public function removeCalendarSchedule(CalendarSchedule $calendarSchedule): self
    {
        if ($this->plant->removeElement($calendarSchedule)) {
            // set the owning side to null (unless already changed)
            if ($calendarSchedule->getUser() === $this) {
                $calendarSchedule->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @ORM\Column(type="json")
     * 
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;


    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->pseudo;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function __toString()
    {
        return $this->pseudo;
    }

}
