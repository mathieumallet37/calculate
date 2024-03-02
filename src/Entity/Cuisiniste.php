<?php

namespace App\Entity;

use App\Repository\CuisinisteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CuisinisteRepository::class)]
class Cuisiniste
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $contact_nom = null;

    #[ORM\Column(length: 255)]
    private ?string $contact_email = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 50)]
    private ?string $telephone = null;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'cuisinistes')]
    private Collection $user;

    #[ORM\OneToMany(mappedBy: 'cuisiniste', targetEntity: Metrage::class)]
    private Collection $metrages;

    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->metrages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getContactNom(): ?string
    {
        return $this->contact_nom;
    }

    public function setContactNom(string $contact_nom): static
    {
        $this->contact_nom = $contact_nom;

        return $this;
    }

    public function getContactEmail(): ?string
    {
        return $this->contact_email;
    }

    public function setContactEmail(string $contact_email): static
    {
        $this->contact_email = $contact_email;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(User $user): static
    {
        if (!$this->user->contains($user)) {
            $this->user->add($user);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        $this->user->removeElement($user);

        return $this;
    }

    /**
     * @return Collection<int, Metrage>
     */
    public function getMetrages(): Collection
    {
        return $this->metrages;
    }

    public function addMetrage(Metrage $metrage): static
    {
        if (!$this->metrages->contains($metrage)) {
            $this->metrages->add($metrage);
            $metrage->setCuisiniste($this);
        }

        return $this;
    }

    public function removeMetrage(Metrage $metrage): static
    {
        if ($this->metrages->removeElement($metrage)) {
            // set the owning side to null (unless already changed)
            if ($metrage->getCuisiniste() === $this) {
                $metrage->setCuisiniste(null);
            }
        }

        return $this;
    }
}
