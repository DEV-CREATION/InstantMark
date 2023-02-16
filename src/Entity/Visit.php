<?php

namespace App\Entity;

use App\Repository\VisitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VisitRepository::class)]
class Visit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $visiteur = null;

    #[ORM\OneToMany(mappedBy: 'visit', targetEntity: Vue::class, orphanRemoval: true)]
    private Collection $vues;

    public function __construct()
    {
        $this->vues = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVisiteur(): ?string
    {
        return $this->visiteur;
    }

    public function setVisiteur(string $visiteur): self
    {
        $this->visiteur = $visiteur;

        return $this;
    }

    /**
     * @return Collection<int, Vue>
     */
    public function getVues(): Collection
    {
        return $this->vues;
    }

    public function addVue(Vue $vue): self
    {
        if (!$this->vues->contains($vue)) {
            $this->vues->add($vue);
            $vue->setVisit($this);
        }

        return $this;
    }

    public function removeVue(Vue $vue): self
    {
        if ($this->vues->removeElement($vue)) {
            // set the owning side to null (unless already changed)
            if ($vue->getVisit() === $this) {
                $vue->setVisit(null);
            }
        }

        return $this;
    }
}
