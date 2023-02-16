<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ImpressionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImpressionRepository::class)]
#[ApiResource]
class Impression
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'impressions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Vue $vue = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVue(): ?Vue
    {
        return $this->vue;
    }

    public function setVue(?Vue $vue): self
    {
        $this->vue = $vue;

        return $this;
    }
}
