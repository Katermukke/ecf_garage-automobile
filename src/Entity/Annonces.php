<?php

namespace App\Entity;

use App\Repository\AnnoncesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnnoncesRepository::class)]
class Annonces
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $dateDePublication = null;

    #[ORM\OneToOne(inversedBy: 'annonces', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?VoituresOccasions $annoncesVoituresOccasions = null;

    #[ORM\ManyToOne(inversedBy: 'utilisateursAnnonces')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateurs $utilisateurs = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDateDePublication(): ?string
    {
        return $this->dateDePublication;
    }

    public function setDateDePublication(string $dateDePublication): static
    {
        $this->dateDePublication = $dateDePublication;

        return $this;
    }

    public function getAnnoncesVoituresOccasions(): ?VoituresOccasions
    {
        return $this->annoncesVoituresOccasions;
    }

    public function setAnnoncesVoituresOccasions(VoituresOccasions $annoncesVoituresOccasions): static
    {
        $this->annoncesVoituresOccasions = $annoncesVoituresOccasions;

        return $this;
    }

    public function getUtilisateurs(): ?Utilisateurs
    {
        return $this->utilisateurs;
    }

    public function setUtilisateurs(?Utilisateurs $utilisateurs): static
    {
        $this->utilisateurs = $utilisateurs;

        return $this;
    }
}
