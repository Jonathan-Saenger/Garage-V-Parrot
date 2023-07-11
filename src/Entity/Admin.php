<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdminRepository::class)]
class Admin
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $mail = null;

    #[ORM\Column(length: 255)]
    private ?string $motdepasse = null;

    #[ORM\OneToMany(mappedBy: 'admin', targetEntity: employe::class)]
    private Collection $employe;

    #[ORM\OneToMany(mappedBy: 'admin', targetEntity: service::class)]
    private Collection $service;

    #[ORM\OneToMany(mappedBy: 'admin', targetEntity: horaire::class)]
    private Collection $horaire;

    public function __construct()
    {
        $this->employe = new ArrayCollection();
        $this->service = new ArrayCollection();
        $this->horaire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
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

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): static
    {
        $this->mail = $mail;

        return $this;
    }

    public function getMotdepasse(): ?string
    {
        return $this->motdepasse;
    }

    public function setMotdepasse(string $motdepasse): static
    {
        $this->motdepasse = $motdepasse;

        return $this;
    }

    /**
     * @return Collection<int, employe>
     */
    public function getEmploye(): Collection
    {
        return $this->employe;
    }

    public function addEmploye(employe $employe): static
    {
        if (!$this->employe->contains($employe)) {
            $this->employe->add($employe);
            $employe->setAdmin($this);
        }

        return $this;
    }

    public function removeEmploye(employe $employe): static
    {
        if ($this->employe->removeElement($employe)) {
            // set the owning side to null (unless already changed)
            if ($employe->getAdmin() === $this) {
                $employe->setAdmin(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, service>
     */
    public function getService(): Collection
    {
        return $this->service;
    }

    public function addService(service $service): static
    {
        if (!$this->service->contains($service)) {
            $this->service->add($service);
            $service->setAdmin($this);
        }

        return $this;
    }

    public function removeService(service $service): static
    {
        if ($this->service->removeElement($service)) {
            // set the owning side to null (unless already changed)
            if ($service->getAdmin() === $this) {
                $service->setAdmin(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, horaire>
     */
    public function getHoraire(): Collection
    {
        return $this->horaire;
    }

    public function addHoraire(horaire $horaire): static
    {
        if (!$this->horaire->contains($horaire)) {
            $this->horaire->add($horaire);
            $horaire->setAdmin($this);
        }

        return $this;
    }

    public function removeHoraire(horaire $horaire): static
    {
        if ($this->horaire->removeElement($horaire)) {
            // set the owning side to null (unless already changed)
            if ($horaire->getAdmin() === $this) {
                $horaire->setAdmin(null);
            }
        }

        return $this;
    }
}