<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CandidatRepository")
 */
class Candidat
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cognoms;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telefon;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $estudis;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Oferta", mappedBy="candidat")
     */
    private $ofertas;

    public function __construct()
    {
        $this->ofertas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getCognoms(): ?string
    {
        return $this->cognoms;
    }

    public function setCognoms(?string $cognoms): self
    {
        $this->cognoms = $cognoms;

        return $this;
    }

    public function getTelefon(): ?int
    {
        return $this->telefon;
    }

    public function setTelefon(?int $telefon): self
    {
        $this->telefon = $telefon;

        return $this;
    }

    public function getEstudis(): ?string
    {
        return $this->estudis;
    }

    public function setEstudis(?string $estudis): self
    {
        $this->estudis = $estudis;

        return $this;
    }

    /**
     * @return Collection|Oferta[]
     */
    public function getOfertes(): Collection
    {
        return $this->ofertas;
    }

    public function addOferta(Oferta $oferta): self
    {
        if (!$this->ofertes->contains($oferta)) {
            $this->ofertes[] = $oferta;
            $oferta->setCandidat($this);
        }

        return $this;
    }

    public function removeOferta(Oferta $oferta): self
    {
        if ($this->ofertes->contains($oferta)) {
            $this->ofertes->removeElement($oferta);
            if ($oferta->getCandidat() === $this) {
                $oferta->setCandidat(null);
            }
        }

        return $this;
    }
}
