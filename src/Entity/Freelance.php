<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FreelanceRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass=FreelanceRepository::class) 
 * @ApiResource(
 *      normalizationContext={"groups"={"freelance:read"}},
 *      denormalizationContext={"groups"={"freelance:write"}})
 */
class Freelance implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("freelance:read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Groups({"freelance:read", "freelance:write"})
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @Groups("freelance:write")
     */
    private $plainPassword;

    /**
     * @ORM\Column(type="string", length=50)
     * @Groups({"freelance:read", "freelance:write"})
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=50)
     * @Groups({"freelance:read", "freelance:write"})
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=50)
     * @Groups({"freelance:read", "freelance:write"})
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=8)
     * @Groups({"freelance:read", "freelance:write"})
     */
    private $zip;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"freelance:read", "freelance:write"})
     */
    private $street;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"freelance:read", "freelance:write"})
     */
    private $diploma;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"freelance:read", "freelance:write"})
     */
    private $lineOfBusiness;

    /**
     * @ORM\Column(type="array")
     * @Groups({"freelance:read", "freelance:write"})
     */
    private $skills = [];

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"freelance:read", "freelance:write"})
     */
    private $available;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"freelance:read", "freelance:write"})
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"freelance:read", "freelance:write"})
     */
    private $bankDetails;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"freelance:read", "freelance:write"})
     */
    private $yearsOfPractice;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getZip(): ?string
    {
        return $this->zip;
    }

    public function setZip(string $zip): self
    {
        $this->zip = $zip;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getDiploma(): ?string
    {
        return $this->diploma;
    }

    public function setDiploma(?string $diploma): self
    {
        $this->diploma = $diploma;

        return $this;
    }

    public function getLineOfBusiness(): ?string
    {
        return $this->lineOfBusiness;
    }

    public function setLineOfBusiness(string $lineOfBusiness): self
    {
        $this->lineOfBusiness = $lineOfBusiness;

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

    public function getAvailable(): ?bool
    {
        return $this->available;
    }

    public function setAvailable(bool $available): self
    {
        $this->available = $available;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getBankDetails(): ?string
    {
        return $this->bankDetails;
    }

    public function setBankDetails(?string $bankDetails): self
    {
        $this->bankDetails = $bankDetails;

        return $this;
    }

    public function getYearsOfPractice(): ?int
    {
        return $this->yearsOfPractice;
    }

    public function setYearsOfPractice(int $yearsOfPractice): self
    {
        $this->yearsOfPractice = $yearsOfPractice;

        return $this;
    }
}
