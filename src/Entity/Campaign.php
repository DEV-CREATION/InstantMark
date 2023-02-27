<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CampaignRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CampaignRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[ApiResource]
class Campaign
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?int $views = null;

    #[ORM\Column(nullable: true)]
    private ?int $clicks = null;

    #[ORM\Column(nullable: true)]
    private ?int $conversions = null;

    #[ORM\Column(nullable: true)]
    private ?int $prority = null;

    #[ORM\Column(nullable: true)]
    private ?int $weight = null;

    #[ORM\Column(nullable: true)]
    private ?int $targetImpression = null;

    #[ORM\Column(nullable: true)]
    private ?int $targetClick = null;

    #[ORM\Column(nullable: true)]
    private ?int $targetConversion = null;

    #[ORM\Column(nullable: true)]
    private ?bool $anonymous = null;

    #[ORM\Column(nullable: true)]
    private ?int $companion = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $comments = null;

    #[ORM\Column(nullable: true)]
    private ?float $income = null;

    #[ORM\Column(nullable: true)]
    private ?int $incomeType = null;

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

    #[ORM\Column(nullable: true)]
    private ?int $status = null;

    #[ORM\Column(nullable: true)]
    private ?int $hostedViews = null;

    #[ORM\Column(nullable: true)]
    private ?int $hostedClicks = null;

    #[ORM\Column(nullable: true)]
    private ?int $viewWindow = null;

    #[ORM\Column(nullable: true)]
    private ?int $clickWindow = null;

    #[ORM\Column(nullable: true)]
    private ?float $ecpm = null;

    #[ORM\Column(nullable: true)]
    private ?int $minImpressions = null;

    #[ORM\Column(nullable: true)]
    private ?bool $ecpmEnabled = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $activateTime = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $expireTime = null;

    #[ORM\ManyToMany(targetEntity: Banner::class, inversedBy: 'campaigns')]
    private Collection $banners;

    #[ORM\ManyToMany(targetEntity: Site::class, inversedBy: 'campaigns')]
    private Collection $sites;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $startedAt = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $endedAt = null;

    public function __construct()
    {
        $this->banners = new ArrayCollection();
        $this->sites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function progressRate(): float
    {
        $totalTime = $this->endedAt->getTimestamp() - $this->startedAt->getTimestamp();
        $spentTime = time() - $this->startedAt->getTimestamp();

        return $spentTime / $totalTime;
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

    public function getViews(): ?int
    {
        return $this->views;
    }

    public function setViews(?int $views): self
    {
        $this->views = $views;

        return $this;
    }

    public function getClicks(): ?int
    {
        return $this->clicks;
    }

    public function setClicks(?int $clicks): self
    {
        $this->clicks = $clicks;

        return $this;
    }

    public function getConversions(): ?int
    {
        return $this->conversions;
    }

    public function setConversions(?int $conversions): self
    {
        $this->conversions = $conversions;

        return $this;
    }

    public function getPrority(): ?int
    {
        return $this->prority;
    }

    public function setPrority(?int $prority): self
    {
        $this->prority = $prority;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(?int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getTargetImpression(): ?int
    {
        return $this->targetImpression;
    }

    public function setTargetImpression(?int $targetImpression): self
    {
        $this->targetImpression = $targetImpression;

        return $this;
    }

    public function getTargetClick(): ?int
    {
        return $this->targetClick;
    }

    public function setTargetClick(?int $targetClick): self
    {
        $this->targetClick = $targetClick;

        return $this;
    }

    public function getTargetConversion(): ?int
    {
        return $this->targetConversion;
    }

    public function setTargetConversion(?int $targetConversion): self
    {
        $this->targetConversion = $targetConversion;

        return $this;
    }

    public function isAnonymous(): ?bool
    {
        return $this->anonymous;
    }

    public function setAnonymous(?bool $anonymous): self
    {
        $this->anonymous = $anonymous;

        return $this;
    }

    public function getCompanion(): ?int
    {
        return $this->companion;
    }

    public function setCompanion(?int $companion): self
    {
        $this->companion = $companion;

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

    public function getIncome(): ?float
    {
        return $this->income;
    }

    public function setIncome(?float $income): self
    {
        $this->income = $income;

        return $this;
    }

    public function getIncomeType(): ?int
    {
        return $this->incomeType;
    }

    public function setIncomeType(?int $incomeType): self
    {
        $this->incomeType = $incomeType;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    #[ORM\PrePersist]
    #[ORM\PreUpdate]
    public function setTimestamps(): self
    {
        $current = new \DateTimeImmutable();
        
        if ($this->createdAt === null) {
            $this->createdAt = $current;
        }

        $this->updatedAt = $current;

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

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(?int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getHostedViews(): ?int
    {
        return $this->hostedViews;
    }

    public function setHostedViews(?int $hostedViews): self
    {
        $this->hostedViews = $hostedViews;

        return $this;
    }

    public function getHostedClicks(): ?int
    {
        return $this->hostedClicks;
    }

    public function setHostedClicks(?int $hostedClicks): self
    {
        $this->hostedClicks = $hostedClicks;

        return $this;
    }

    public function getViewWindow(): ?int
    {
        return $this->viewWindow;
    }

    public function setViewWindow(?int $viewWindow): self
    {
        $this->viewWindow = $viewWindow;

        return $this;
    }

    public function getClickWindow(): ?int
    {
        return $this->clickWindow;
    }

    public function setClickWindow(?int $clickWindow): self
    {
        $this->clickWindow = $clickWindow;

        return $this;
    }

    public function getEcpm(): ?float
    {
        return $this->ecpm;
    }

    public function setEcpm(?float $ecpm): self
    {
        $this->ecpm = $ecpm;

        return $this;
    }

    public function getMinImpressions(): ?int
    {
        return $this->minImpressions;
    }

    public function setMinImpressions(?int $minImpressions): self
    {
        $this->minImpressions = $minImpressions;

        return $this;
    }

    public function isEcpmEnabled(): ?bool
    {
        return $this->ecpmEnabled;
    }

    public function setEcpmEnabled(?bool $ecpmEnabled): self
    {
        $this->ecpmEnabled = $ecpmEnabled;

        return $this;
    }

    public function getActivateTime(): ?\DateTimeImmutable
    {
        return $this->activateTime;
    }

    public function setActivateTime(?\DateTimeImmutable $activateTime): self
    {
        $this->activateTime = $activateTime;

        return $this;
    }

    public function getExpireTime(): ?\DateTimeImmutable
    {
        return $this->expireTime;
    }

    public function setExpireTime(?\DateTimeImmutable $expireTime): self
    {
        $this->expireTime = $expireTime;

        return $this;
    }

    /**
     * @return Collection<int, Banner>
     */
    public function getBanners(): Collection
    {
        return $this->banners;
    }

    public function addBanner(Banner $banner): self
    {
        if (!$this->banners->contains($banner)) {
            $this->banners->add($banner);
        }

        return $this;
    }

    public function removeBanner(Banner $banner): self
    {
        $this->banners->removeElement($banner);

        return $this;
    }

    /**
     * @return Collection<int, Site>
     */
    public function getSites(): Collection
    {
        return $this->sites;
    }

    public function addSite(Site $site): self
    {
        if (!$this->sites->contains($site)) {
            $this->sites->add($site);
        }

        return $this;
    }

    public function removeSite(Site $site): self
    {
        $this->sites->removeElement($site);

        return $this;
    }

    public function getStartedAt(): ?\DateTimeImmutable
    {
        return $this->startedAt;
    }

    public function setStartedAt(\DateTimeImmutable $startedAt): self
    {
        $this->startedAt = $startedAt;

        return $this;
    }

    public function getEndedAt(): ?\DateTimeImmutable
    {
        return $this->endedAt;
    }

    public function setEndedAt(\DateTimeImmutable $endedAt): self
    {
        $this->endedAt = $endedAt;

        return $this;
    }
}
