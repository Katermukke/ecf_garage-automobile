<?php

namespace App\Entity;

use App\Repository\ModelesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModelesRepository::class)]
class Modeles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nomModeles = null;

    #[ORM\ManyToOne(inversedBy: 'marquesModeles')]
    private ?Marques $marquesModeles = null;

    public function getNomModeles(): ?string
    {
        return $this->nomModeles;
    }

    public function setNomModeles(string $nomModeles): static
    {
        $this->nomModeles = $nomModeles;

        return $this;
    }

    public function getMarquesModeles(): ?Marques
    {
        return $this->marquesModeles;
    }

    public function setMarquesModeles(?Marques $marquesModeles): static
    {
        $this->marquesModeles = $marquesModeles;

        return $this;
    }
}
