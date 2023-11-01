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

    #[ORM\Column(length: 50)]
    private ?string $cylindree = null;

    #[ORM\Column(length: 10)]
    private ?string $chevaux = null;

    #[ORM\OneToMany(mappedBy: 'marquesModeles', targetEntity: Marques::class)]
    private Collection $marques;

    public function __construct()
    {
        $this->marques = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomModeles(): ?string
    {
        return $this->nomModeles;
    }

    public function setNomModeles(string $nomModeles): static
    {
        $this->nomModeles = $nomModeles;

        return $this;
    }

    public function getCylindree(): ?string
    {
        return $this->cylindree;
    }

    public function setCylindree(string $cylindree): static
    {
        $this->cylindree = $cylindree;

        return $this;
    }

    public function getChevaux(): ?string
    {
        return $this->chevaux;
    }

    public function setChevaux(string $chevaux): static
    {
        $this->chevaux = $chevaux;

        return $this;
    }

    /**
     * @return Collection<int, Marques>
     */
    public function getMarques(): Collection
    {
        return $this->marques;
    }

    public function addMarque(Marques $marque): static
    {
        if (!$this->marques->contains($marque)) {
            $this->marques->add($marque);
            $marque->setMarquesModeles($this);
        }

        return $this;
    }

    public function removeMarque(Marques $marque): static
    {
        if ($this->marques->removeElement($marque)) {
            // set the owning side to null (unless already changed)
            if ($marque->getMarquesModeles() === $this) {
                $marque->setMarquesModeles(null);
            }
        }

        return $this;
    }
}
