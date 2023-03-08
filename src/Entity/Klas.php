<?php

namespace App\Entity;

use App\Repository\KlasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KlasRepository::class)]
class Klas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'klas', targetEntity: Leerlingen::class)]
    private Collection $leerlingen;

    public function __construct()
    {
        $this->leerlingen = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Leerlingen>
     */
    public function getLeerlingen(): Collection
    {
        return $this->leerlingen;
    }

    public function addLeerlingen(Leerlingen $leerlingen): self
    {
        if (!$this->leerlingen->contains($leerlingen)) {
            $this->leerlingen->add($leerlingen);
            $leerlingen->setKlas($this);
        }

        return $this;
    }

    public function removeLeerlingen(Leerlingen $leerlingen): self
    {
        if ($this->leerlingen->removeElement($leerlingen)) {
            // set the owning side to null (unless already changed)
            if ($leerlingen->getKlas() === $this) {
                $leerlingen->setKlas(null);
            }
        }

        return $this;
    }
}
