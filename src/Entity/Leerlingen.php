<?php

namespace App\Entity;

use App\Repository\LeerlingenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LeerlingenRepository::class)]
class Leerlingen
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $snummer = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'leerlingen')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Klas $klas = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSnummer(): ?string
    {
        return $this->snummer;
    }

    public function setSnummer(string $snummer): self
    {
        $this->snummer = $snummer;

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

    public function getKlas(): ?Klas
    {
        return $this->klas;
    }

    public function setKlas(?Klas $klas): self
    {
        $this->klas = $klas;

        return $this;
    }
}
