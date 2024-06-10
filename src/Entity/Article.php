<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $entity_id = null;

    #[ORM\Column(length: 255)]
    private ?string $CategoryName = null;

    #[ORM\Column(length: 255)]
    private ?string $sku = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 2000)]
    private ?string $shortdesc = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column(length: 255)]
    private ?string $link = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(length: 255)]
    private ?string $Brand = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $Rating = null;

    #[ORM\Column(length: 255)]
    private ?string $CaffeineType = null;

    #[ORM\Column]
    private ?int $Count = null;

    #[ORM\Column(length: 3)]
    private ?string $Flavored = null;

    #[ORM\Column(length: 3, nullable: true)]
    private ?string $Seasonal = null;

    #[ORM\Column(length: 3, nullable: true)]
    private ?string $Instock = null;

    #[ORM\Column]
    private ?bool $Facebook = null;

    #[ORM\Column(nullable: true)]
    private ?bool $IsKCup = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEntityId(): ?int
    {
        return $this->entity_id;
    }

    public function setEntityId(int $entity_id): static
    {
        $this->entity_id = $entity_id;

        return $this;
    }

    public function getCategoryName(): ?string
    {
        return $this->CategoryName;
    }

    public function setCategoryName(string $CategoryName): static
    {
        $this->CategoryName = $CategoryName;

        return $this;
    }

    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function setSku(string $sku): static
    {
        $this->sku = $sku;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getShortdesc(): ?string
    {
        return $this->shortdesc;
    }

    public function setShortdesc(string $shortdesc): static
    {
        $this->shortdesc = $shortdesc;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): static
    {
        $this->link = $link;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->Brand;
    }

    public function setBrand(string $Brand): static
    {
        $this->Brand = $Brand;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->Rating;
    }

    public function setRating(int $Rating): static
    {
        $this->Rating = $Rating;

        return $this;
    }

    public function getCaffeineType(): ?string
    {
        return $this->CaffeineType;
    }

    public function setCaffeineType(string $CaffeineType): static
    {
        $this->CaffeineType = $CaffeineType;

        return $this;
    }

    public function getCount(): ?int
    {
        return $this->Count;
    }

    public function setCount(int $Count): static
    {
        $this->Count = $Count;

        return $this;
    }


    public function getFlavored(): ?string
    {
        return $this->Flavored;
    }

    public function setFlavored(string $Flavored): static
    {
        $this->Flavored = $Flavored;

        return $this;
    }

    public function getSeasonal(): ?string
    {
        return $this->Seasonal;
    }

    public function setSeasonal(string $Seasonal): static
    {
        $this->Seasonal = $Seasonal;

        return $this;
    }

    public function getInstock(): ?string
    {
        return $this->Instock;
    }

    public function setInstock(string $Instock): static
    {
        $this->Instock = $Instock;

        return $this;
    }

    public function isFacebook(): ?bool
    {
        return $this->Facebook;
    }

    public function setFacebook(bool $Facebook): static
    {
        $this->Facebook = $Facebook;

        return $this;
    }

    public function isKCup(): ?bool
    {
        return $this->IsKCup;
    }

    public function setKCup(bool $IsKCup): static
    {
        $this->IsKCup = $IsKCup;

        return $this;
    }
}
