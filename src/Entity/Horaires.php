<?php

namespace App\Entity;

use App\Repository\HorairesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HorairesRepository::class)]
class Horaires
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $heures_ouvertures = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $heures_fermetures = null;

    #[ORM\ManyToOne(inversedBy: 'jours_horaires')]
    private ?Jours $jour = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeuresOuvertures(): ?\DateTimeInterface
    {
        return $this->heures_ouvertures;
    }

    public function setHeuresOuvertures(?\DateTimeInterface $heures_ouvertures): static
    {
        $this->heures_ouvertures = $heures_ouvertures;

        return $this;
    }

    public function getHeuresFermetures(): ?\DateTimeInterface
    {
        return $this->heures_fermetures;
    }

    public function setHeuresFermetures(?\DateTimeInterface $heures_fermetures): static
    {
        $this->heures_fermetures = $heures_fermetures;

        return $this;
    }

    public function getJour(): ?Jours
    {
        return $this->jour;
    }

    public function setJour(?Jours $jour): static
    {
        $this->jour = $jour;

        return $this;
    }
}
