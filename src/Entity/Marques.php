<?php

namespace App\Entity;

use App\Repository\MarquesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MarquesRepository::class)]
class Marques
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nomMarques = null;

    #[ORM\OneToMany(mappedBy: 'voituresOcassionsMarques', targetEntity: VoituresOccasions::class)]
    private Collection $voituresOccasions;

    #[ORM\OneToMany(mappedBy: 'marquesModeles', targetEntity: Modeles::class)]
    private Collection $marquesModeles;

    public function __construct()
    {
        $this->voituresOccasions = new ArrayCollection();
        $this->marquesModeles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMarques(): ?string
    {
        return $this->nomMarques;
    }

    public function setNomMarques(string $nomMarques): static
    {
        $this->nomMarques = $nomMarques;

        return $this;
    }

    /**
     * @return Collection<int, VoituresOccasions>
     */
    public function getVoituresOccasions(): Collection
    {
        return $this->voituresOccasions;
    }

    public function addVoituresOccasion(VoituresOccasions $voituresOccasion): static
    {
        if (!$this->voituresOccasions->contains($voituresOccasion)) {
            $this->voituresOccasions->add($voituresOccasion);
            $voituresOccasion->setVoituresOcassionsMarques($this);
        }

        return $this;
    }

    public function removeVoituresOccasion(VoituresOccasions $voituresOccasion): static
    {
        if ($this->voituresOccasions->removeElement($voituresOccasion)) {
            // set the owning side to null (unless already changed)
            if ($voituresOccasion->getVoituresOcassionsMarques() === $this) {
                $voituresOccasion->setVoituresOcassionsMarques(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Modeles>
     */
    public function getMarquesModeles(): Collection
    {
        return $this->marquesModeles;
    }

    public function setMarquesModeles(Collection $modeles): self
    {
        $this->marquesModeles = $modeles;
        return $this;
    }

    public function addMarquesModele(Modeles $marquesModele): static
    {
        if (!$this->marquesModeles->contains($marquesModele)) {
            $this->marquesModeles->add($marquesModele);
            $marquesModele->setMarquesModeles($this);
        }

        return $this;
    }

    public function removeMarquesModele(Modeles $marquesModele): static
    {
        if ($this->marquesModeles->removeElement($marquesModele)) {
            // set the owning side to null (unless already changed)
            if ($marquesModele->getMarquesModeles() === $this) {
                $marquesModele->setMarquesModeles(null);
            }
        }

        return $this;
    }
}
