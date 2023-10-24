<?php

namespace App\Entity;

use App\Repository\JoursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JoursRepository::class)]
class Jours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'jour', targetEntity: Horaires::class)]
    private Collection $jours_horaires;

    #[ORM\ManyToOne(inversedBy: 'utilisateursJours')]
    private ?Utilisateurs $utilisateurs = null;

    public function __construct()
    {
        $this->jours_horaires = new ArrayCollection();
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

    /**
     * @return Collection<int, Horaires>
     */
    public function getJoursHoraires(): Collection
    {
        return $this->jours_horaires;
    }

    public function addJoursHoraire(Horaires $joursHoraire): static
    {
        if (!$this->jours_horaires->contains($joursHoraire)) {
            $this->jours_horaires->add($joursHoraire);
            $joursHoraire->setJour($this);
        }

        return $this;
    }

    public function removeJoursHoraire(Horaires $joursHoraire): static
    {
        if ($this->jours_horaires->removeElement($joursHoraire)) {
            // set the owning side to null (unless already changed)
            if ($joursHoraire->getJour() === $this) {
                $joursHoraire->setJour(null);
            }
        }

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
