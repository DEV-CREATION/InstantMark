<?php

namespace App\Entity;

use App\Repository\ZoneRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ZoneRepository::class)]
class Zone
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $width = null;

    #[ORM\Column]
    private ?int $height = null;

    #[ORM\Column(nullable: true)]
    private ?int $delivery = null;

    #[ORM\Column(nullable: true)]
    private ?int $type = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $category = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $ad_selection = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $chain = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $prepend = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $append = null;

    #[ORM\Column(nullable: true)]
    private ?int $appendType = null;

    #[ORM\Column(nullable: true)]
    private ?bool $forceAppend = null;

    #[ORM\Column(nullable: true)]
    private ?int $inventoryForecastType = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $comments = null;

    #[ORM\Column(nullable: true)]
    private ?float $cost = null;

    #[ORM\Column(nullable: true)]
    private ?int $costType = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $costVariableId = null;

    #[ORM\Column(nullable: true)]
    private ?float $technologyCost = null;

    #[ORM\Column(nullable: true)]
    private ?int $technologyCostType = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(nullable: true)]
    private ?int $block = null;

    #[ORM\Column(nullable: true)]
    private ?int $capping = null;

    #[ORM\Column(nullable: true)]
    private ?int $sessionCapping = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $what = null;

    #[ORM\Column(nullable: true)]
    private ?float $rate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pricing = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $oacCategoryId = null;

    #[ORM\ManyToOne(inversedBy: 'zones')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Site $site = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(int $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(int $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getDelivery(): ?int
    {
        return $this->delivery;
    }

    public function setDelivery(?int $delivery): self
    {
        $this->delivery = $delivery;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(?int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(?string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getAdSelection(): ?string
    {
        return $this->ad_selection;
    }

    public function setAdSelection(?string $ad_selection): self
    {
        $this->ad_selection = $ad_selection;

        return $this;
    }

    public function getChain(): ?string
    {
        return $this->chain;
    }

    public function setChain(?string $chain): self
    {
        $this->chain = $chain;

        return $this;
    }

    public function getPrepend(): ?string
    {
        return $this->prepend;
    }

    public function setPrepend(?string $prepend): self
    {
        $this->prepend = $prepend;

        return $this;
    }

    public function getAppend(): ?string
    {
        return $this->append;
    }

    public function setAppend(?string $append): self
    {
        $this->append = $append;

        return $this;
    }

    public function getAppendType(): ?int
    {
        return $this->appendType;
    }

    public function setAppendType(?int $appendType): self
    {
        $this->appendType = $appendType;

        return $this;
    }

    public function isForceAppend(): ?bool
    {
        return $this->forceAppend;
    }

    public function setForceAppend(?bool $forceAppend): self
    {
        $this->forceAppend = $forceAppend;

        return $this;
    }

    public function getInventoryForecastType(): ?int
    {
        return $this->inventoryForecastType;
    }

    public function setInventoryForecastType(?int $inventoryForecastType): self
    {
        $this->inventoryForecastType = $inventoryForecastType;

        return $this;
    }

    public function getComments(): ?string
    {
        return $this->comments;
    }

    public function setComments(?string $comments): self
    {
        $this->comments = $comments;

        return $this;
    }

    public function getCost(): ?float
    {
        return $this->cost;
    }

    public function setCost(?float $cost): self
    {
        $this->cost = $cost;

        return $this;
    }

    public function getCostType(): ?int
    {
        return $this->costType;
    }

    public function setCostType(?int $costType): self
    {
        $this->costType = $costType;

        return $this;
    }

    public function getCostVariableId(): ?string
    {
        return $this->costVariableId;
    }

    public function setCostVariableId(?string $costVariableId): self
    {
        $this->costVariableId = $costVariableId;

        return $this;
    }

    public function getTechnologyCost(): ?float
    {
        return $this->technologyCost;
    }

    public function setTechnologyCost(?float $technologyCost): self
    {
        $this->technologyCost = $technologyCost;

        return $this;
    }

    public function getTechnologyCostType(): ?int
    {
        return $this->technologyCostType;
    }

    public function setTechnologyCostType(?int $technologyCostType): self
    {
        $this->technologyCostType = $technologyCostType;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getBlock(): ?int
    {
        return $this->block;
    }

    public function setBlock(?int $block): self
    {
        $this->block = $block;

        return $this;
    }

    public function getCapping(): ?int
    {
        return $this->capping;
    }

    public function setCapping(?int $capping): self
    {
        $this->capping = $capping;

        return $this;
    }

    public function getSessionCapping(): ?int
    {
        return $this->sessionCapping;
    }

    public function setSessionCapping(?int $sessionCapping): self
    {
        $this->sessionCapping = $sessionCapping;

        return $this;
    }

    public function getWhat(): ?string
    {
        return $this->what;
    }

    public function setWhat(?string $what): self
    {
        $this->what = $what;

        return $this;
    }

    public function getRate(): ?float
    {
        return $this->rate;
    }

    public function setRate(?float $rate): self
    {
        $this->rate = $rate;

        return $this;
    }

    public function getPricing(): ?string
    {
        return $this->pricing;
    }

    public function setPricing(?string $pricing): self
    {
        $this->pricing = $pricing;

        return $this;
    }

    public function getOacCategoryId(): ?string
    {
        return $this->oacCategoryId;
    }

    public function setOacCategoryId(?string $oacCategoryId): self
    {
        $this->oacCategoryId = $oacCategoryId;

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
}
