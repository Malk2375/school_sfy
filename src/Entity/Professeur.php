<?php

namespace App\Entity;

use App\Repository\ProfesseurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfesseurRepository::class)]
class Professeur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\Range(
        min: 100,
        max: 1000,
        notInRangeMessage: 'Matricule doit etre entre {{ min }} et {{ max }}',
    )]
    private ?string $matricule = null;

    #[ORM\ManyToOne(inversedBy: 'prof')]
    private ?Matiere $matiere = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): static
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getMatiere(): ?Matiere
    {
        return $this->matiere;
    }

    public function setMatiere(?Matiere $matiere): static
    {
        $this->matiere = $matiere;

        return $this;
    }
}
