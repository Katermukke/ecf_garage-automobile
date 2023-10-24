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

    #[ORM\Column(length: 255)]
    private ?string $nomMarques = null;

    #[ORM\OneToMany(mappedBy: 'voituresOcassionsMarques', targetEntity: VoituresOccasions::class)]
    private Collection $voituresOccasions;

    #[ORM\ManyToOne(inversedBy: 'marques')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Modeles $marquesModeles = null;

    public function __construct()
    {
        $this->voituresOccasions = new ArrayCollection();
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

    public function getMarquesModeles(): ?Modeles
    {
        return $this->marquesModeles;
    }

    public function setMarquesModeles(?Modeles $marquesModeles): static
    {
        $this->marquesModeles = $marquesModeles;

        return $this;
    }
}
