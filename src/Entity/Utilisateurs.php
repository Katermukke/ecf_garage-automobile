<?php

namespace App\Entity;

use App\Repository\UtilisateursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UtilisateursRepository::class)]
class Utilisateurs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $motsDePasse = null;

    #[ORM\Column(length: 255)]
    private ?string $roles = null;

    #[ORM\OneToMany(mappedBy: 'utilisateurs', targetEntity: Jours::class)]
    private Collection $utilisateursJours;

    #[ORM\ManyToOne(inversedBy: 'utilisateurs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Roles $utilisateursRoles = null;

    #[ORM\OneToMany(mappedBy: 'servicesUtilisateurs', targetEntity: Services::class)]
    private Collection $services;

    #[ORM\ManyToMany(targetEntity: Annonces::class, mappedBy: 'annoncesUtilisateurs')]
    private Collection $annonces;

    public function __construct()
    {
        $this->utilisateursJours = new ArrayCollection();
        $this->services = new ArrayCollection();
        $this->annonces = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getMotsDePasse(): ?string
    {
        return $this->motsDePasse;
    }

    public function setMotsDePasse(string $motsDePasse): static
    {
        $this->motsDePasse = $motsDePasse;

        return $this;
    }

    public function getRoles(): ?string
    {
        return $this->roles;
    }

    public function setRoles(string $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @return Collection<int, Jours>
     */
    public function getUtilisateursJours(): Collection
    {
        return $this->utilisateursJours;
    }

    public function addUtilisateursJour(Jours $utilisateursJour): static
    {
        if (!$this->utilisateursJours->contains($utilisateursJour)) {
            $this->utilisateursJours->add($utilisateursJour);
            $utilisateursJour->setUtilisateurs($this);
        }

        return $this;
    }

    public function removeUtilisateursJour(Jours $utilisateursJour): static
    {
        if ($this->utilisateursJours->removeElement($utilisateursJour)) {
            // set the owning side to null (unless already changed)
            if ($utilisateursJour->getUtilisateurs() === $this) {
                $utilisateursJour->setUtilisateurs(null);
            }
        }

        return $this;
    }

    public function getUtilisateursRoles(): ?Roles
    {
        return $this->utilisateursRoles;
    }

    public function setUtilisateursRoles(?Roles $utilisateursRoles): static
    {
        $this->utilisateursRoles = $utilisateursRoles;

        return $this;
    }

    /**
     * @return Collection<int, Services>
     */
    public function getServices(): Collection
    {
        return $this->services;
    }

    public function addService(Services $service): static
    {
        if (!$this->services->contains($service)) {
            $this->services->add($service);
            $service->setServicesUtilisateurs($this);
        }

        return $this;
    }

    public function removeService(Services $service): static
    {
        if ($this->services->removeElement($service)) {
            // set the owning side to null (unless already changed)
            if ($service->getServicesUtilisateurs() === $this) {
                $service->setServicesUtilisateurs(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Annonces>
     */
    public function getAnnonces(): Collection
    {
        return $this->annonces;
    }

    public function addAnnonce(Annonces $annonce): static
    {
        if (!$this->annonces->contains($annonce)) {
            $this->annonces->add($annonce);
            $annonce->addAnnoncesUtilisateur($this);
        }

        return $this;
    }

    public function removeAnnonce(Annonces $annonce): static
    {
        if ($this->annonces->removeElement($annonce)) {
            $annonce->removeAnnoncesUtilisateur($this);
        }

        return $this;
    }
}
