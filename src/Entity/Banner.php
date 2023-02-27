<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\BannerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BannerRepository::class)]
#[ApiResource]
class Banner
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $contentType = null;

    #[ORM\Column(nullable: true)]
    private ?int $pluginVersion = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $storageType = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $filename = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageUrl = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $htmlTemplate = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $htmlCache = null;

    #[ORM\Column(nullable: true)]
    private ?int $width = null;

    #[ORM\Column(nullable: true)]
    private ?int $height = null;

    #[ORM\Column(nullable: true)]
    private ?int $weight = null;

    #[ORM\Column(nullable: true)]
    private ?int $seq = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $target = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $url = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $alt = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $statusText = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $bannerText = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adserver = null;

    #[ORM\Column(nullable: true)]
    private ?int $block = null;

    #[ORM\Column(nullable: true)]
    private ?int $capping = null;

    #[ORM\Column(nullable: true)]
    private ?int $sessionCapping = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $compiledLimitation = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $saclPlugins = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $append = null;

    #[ORM\Column(nullable: true)]
    private ?int $bannerType = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $altFilename = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $altImageUrl = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $altContentType = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $comments = null;

    #[ORM\ManyToMany(targetEntity: Campaign::class, mappedBy: 'banners')]
    private Collection $campaigns;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    public function __construct()
    {
        $this->campaigns = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContentType(): ?string
    {
        return $this->contentType;
    }

    public function setContentType(?string $contentType): self
    {
        $this->contentType = $contentType;

        return $this;
    }

    public function getPluginVersion(): ?int
    {
        return $this->pluginVersion;
    }

    public function setPluginVersion(?int $pluginVersion): self
    {
        $this->pluginVersion = $pluginVersion;

        return $this;
    }

    public function getStorageType(): ?string
    {
        return $this->storageType;
    }

    public function setStorageType(?string $storageType): self
    {
        $this->storageType = $storageType;

        return $this;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(?string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(?string $imageUrl): self
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    public function getHtmlTemplate(): ?string
    {
        return $this->htmlTemplate;
    }

    public function setHtmlTemplate(?string $htmlTemplate): self
    {
        $this->htmlTemplate = $htmlTemplate;

        return $this;
    }

    public function getHtmlCache(): ?string
    {
        return $this->htmlCache;
    }

    public function setHtmlCache(?string $htmlCache): self
    {
        $this->htmlCache = $htmlCache;

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

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(?int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getSeq(): ?int
    {
        return $this->seq;
    }

    public function setSeq(?int $seq): self
    {
        $this->seq = $seq;

        return $this;
    }

    public function getTarget(): ?string
    {
        return $this->target;
    }

    public function setTarget(?string $target): self
    {
        $this->target = $target;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getAlt(): ?string
    {
        return $this->alt;
    }

    public function setAlt(?string $alt): self
    {
        $this->alt = $alt;

        return $this;
    }

    public function getStatusText(): ?string
    {
        return $this->statusText;
    }

    public function setStatusText(?string $statusText): self
    {
        $this->statusText = $statusText;

        return $this;
    }

    public function getBannerText(): ?string
    {
        return $this->bannerText;
    }

    public function setBannerText(?string $bannerText): self
    {
        $this->bannerText = $bannerText;

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

    public function getAdserver(): ?string
    {
        return $this->adserver;
    }

    public function setAdserver(?string $adserver): self
    {
        $this->adserver = $adserver;

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

    public function getCompiledLimitation(): ?string
    {
        return $this->compiledLimitation;
    }

    public function setCompiledLimitation(?string $compiledLimitation): self
    {
        $this->compiledLimitation = $compiledLimitation;

        return $this;
    }

    public function getSaclPlugins(): ?string
    {
        return $this->saclPlugins;
    }

    public function setSaclPlugins(?string $saclPlugins): self
    {
        $this->saclPlugins = $saclPlugins;

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

    public function getBannerType(): ?int
    {
        return $this->bannerType;
    }

    public function setBannerType(?int $bannerType): self
    {
        $this->bannerType = $bannerType;

        return $this;
    }

    public function getAltFilename(): ?string
    {
        return $this->altFilename;
    }

    public function setAltFilename(?string $altFilename): self
    {
        $this->altFilename = $altFilename;

        return $this;
    }

    public function getAltImageUrl(): ?string
    {
        return $this->altImageUrl;
    }

    public function setAltImageUrl(?string $altImageUrl): self
    {
        $this->altImageUrl = $altImageUrl;

        return $this;
    }

    public function getAltContentType(): ?string
    {
        return $this->altContentType;
    }

    public function setAltContentType(?string $altContentType): self
    {
        $this->altContentType = $altContentType;

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

    /**
     * @return Collection<int, Campaign>
     */
    public function getCampaigns(): Collection
    {
        return $this->campaigns;
    }

    public function addCampaign(Campaign $campaign): self
    {
        if (!$this->campaigns->contains($campaign)) {
            $this->campaigns->add($campaign);
            $campaign->addBanner($this);
        }

        return $this;
    }

    public function removeCampaign(Campaign $campaign): self
    {
        if ($this->campaigns->removeElement($campaign)) {
            $campaign->removeBanner($this);
        }

        return $this;
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
}
