<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\VueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VueRepository::class)]
#[ApiResource]
class Vue
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $date = null;

    #[ORM\ManyToOne(inversedBy: 'vues')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Site $site = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $page = null;

    #[ORM\OneToMany(mappedBy: 'vue', targetEntity: Impression::class, orphanRemoval: true)]
    private Collection $impressions;

    #[ORM\ManyToOne(inversedBy: 'vues')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Visit $visit = null;

    public function __construct()
    {
        $this->impressions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    public function setDate(\DateTimeImmutable $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getSite(): ?Site
    {
        return $this->site;
    }

    public function setSite(?Site $site): self
    {
        $this->site = $site;

        return $this;
    }

    public function getPage(): ?string
    {
        return $this->page;
    }

    public function setPage(?string $page): self
    {
        $this->page = $page;

        return $this;
    }

    /**
     * @return Collection<int, Impression>
     */
    public function getImpressions(): Collection
    {
        return $this->impressions;
    }

    public function addImpression(Impression $impression): self
    {
        if (!$this->impressions->contains($impression)) {
            $this->impressions->add($impression);
            $impression->setVue($this);
        }

        return $this;
    }

    public function removeImpression(Impression $impression): self
    {
        if ($this->impressions->removeElement($impression)) {
            // set the owning side to null (unless already changed)
            if ($impression->getVue() === $this) {
                $impression->setVue(null);
            }
        }

        return $this;
    }

    public function getVisit(): ?Visit
    {
        return $this->visit;
    }

    public function setVisit(?Visit $visit): self
    {
        $this->visit = $visit;

        return $this;
    }
}
