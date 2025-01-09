<?php

namespace App\Entity;

use App\Repository\MatiereRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MatiereRepository::class)]
class Matiere
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $code = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $libelle = null;

    /**
     * @var Collection<int, Professeur>
     */
    #[ORM\OneToMany(targetEntity: Professeur::class, mappedBy: 'matiere')]
    private Collection $prof;

    /**
     * @var Collection<int, Stage>
     */
    #[ORM\OneToMany(targetEntity: Stage::class, mappedBy: 'matiere')]
    private Collection $stage;

    public function __construct()
    {
        $this->prof = new ArrayCollection();
        $this->stage = new ArrayCollection();
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

    /**
     * @return Collection<int, Professeur>
     */
    public function getProf(): Collection
    {
        return $this->prof;
    }

    public function addProf(Professeur $prof): static
    {
        if (!$this->prof->contains($prof)) {
            $this->prof->add($prof);
            $prof->setMatiere($this);
        }

        return $this;
    }

    public function removeProf(Professeur $prof): static
    {
        if ($this->prof->removeElement($prof)) {
            // set the owning side to null (unless already changed)
            if ($prof->getMatiere() === $this) {
                $prof->setMatiere(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Stage>
     */
    public function getStage(): Collection
    {
        return $this->stage;
    }

    public function addStage(Stage $stage): static
    {
        if (!$this->stage->contains($stage)) {
            $this->stage->add($stage);
            $stage->setMatiere($this);
        }

        return $this;
    }

    public function removeStage(Stage $stage): static
    {
        if ($this->stage->removeElement($stage)) {
            // set the owning side to null (unless already changed)
            if ($stage->getMatiere() === $this) {
                $stage->setMatiere(null);
            }
        }

        return $this;
    }
}
