<?php

namespace App\Entity;

use App\Repository\StageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StageRepository::class)]
class Stage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $code = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $libelle = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $dateDebut = null;

    /**
     * @var Collection<int, Stagiaire>
     */
    #[ORM\OneToMany(targetEntity: Stagiaire::class, mappedBy: 'stage')]
    private Collection $stagiaire;

    #[ORM\ManyToOne(inversedBy: 'stage')]
    private ?Matiere $matiere = null;

    public function __construct()
    {
        $this->stagiaire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeImmutable
    {
        return $this->dateDebut;
    }

    public function setDateDebut(?\DateTimeImmutable $dateDebut): static
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * @return Collection<int, Stagiaire>
     */
    public function getStagiaire(): Collection
    {
        return $this->stagiaire;
    }

    public function addStagiaire(Stagiaire $stagiaire): static
    {
        if (!$this->stagiaire->contains($stagiaire)) {
            $this->stagiaire->add($stagiaire);
            $stagiaire->setStage($this);
        }

        return $this;
    }

    public function removeStagiaire(Stagiaire $stagiaire): static
    {
        if ($this->stagiaire->removeElement($stagiaire)) {
            // set the owning side to null (unless already changed)
            if ($stagiaire->getStage() === $this) {
                $stagiaire->setStage(null);
            }
        }

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
