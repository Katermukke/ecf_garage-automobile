<?php

namespace App\Entity;

use App\Repository\ImagesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImagesRepository::class)]
class Images
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\ManyToOne(inversedBy: 'voituresOcassionsImages')]
    private ?VoituresOccasions $voituresOccasions = null;

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

    public function getVoituresOccasions(): ?VoituresOccasions
    {
        return $this->voituresOccasions;
    }

    public function setVoituresOccasions(?VoituresOccasions $voituresOccasions): static
    {
        $this->voituresOccasions = $voituresOccasions;

        return $this;
    }
}
