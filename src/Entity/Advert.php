<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AdvertRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass=AdvertRepository::class)
 *  @ApiResource(
 *      normalizationContext={"groups"={"advert:read"}},
 *      denormalizationContext={"groups"={"advert:write"}})
 */
class Advert
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("advert:read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"advert:read", "advert:write"})
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"advert:read", "advert:write"})
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=10)
     * @Groups({"advert:read", "advert:write"})
     */
    private $duration;

    /**
     * @ORM\Column(type="date")
     * @Groups({"advert:read", "advert:write"})
     */
    private $beginning;

    /**
     * @ORM\Column(type="date")
     * @Groups({"advert:read", "advert:write"})
     */
    private $finish;

    /**
     * @ORM\Column(type="array")
     * @Groups({"advert:read", "advert:write"})
     */
    private $skills = [];

    /**
     * @ORM\Column(type="integer")
     * @Groups({"advert:read", "advert:write"})
     */
    private $minimum_price;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"advert:read", "advert:write"})
     */
    private $maximum_price;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"advert:read", "advert:write"})
     */
    private $location;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="adverts")
     * @Groups("advert:read")
     */
    private $company;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getBeginning(): ?\DateTimeInterface
    {
        return $this->beginning;
    }

    public function setBeginning(\DateTimeInterface $beginning): self
    {
        $this->beginning = $beginning;

        return $this;
    }

    public function getFinish(): ?\DateTimeInterface
    {
        return $this->finish;
    }

    public function setFinish(\DateTimeInterface $finish): self
    {
        $this->finish = $finish;

        return $this;
    }

    public function getSkills(): ?array
    {
        return $this->skills;
    }

    public function setSkills(array $skills): self
    {
        $this->skills = $skills;

        return $this;
    }

    public function getMinimumPrice(): ?int
    {
        return $this->minimum_price;
    }

    public function setMinimumPrice(int $minimum_price): self
    {
        $this->minimum_price = $minimum_price;

        return $this;
    }

    public function getMaximumPrice(): ?int
    {
        return $this->maximum_price;
    }

    public function setMaximumPrice(int $maximum_price): self
    {
        $this->maximum_price = $maximum_price;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): self
    {
        $this->company = $company;

        return $this;
    }
}
