<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmpresaRepository")
 */
class Empresa
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
    private $tipus;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $logo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $correu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Oferta", mappedBy="empresa")
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

    public function getTipus(): ?string
    {
        return $this->tipus;
    }

    public function setTipus(?string $tipus): self
    {
        $this->tipus = $tipus;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getCorreu(): ?string
    {
        return $this->correu;
    }

    public function setCorreu(?string $correu): self
    {
        $this->correu = $correu;

        return $this;
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

    /**
     * @return Collection|Oferta[]
     */
    public function getOfertes(): Collection
    {
        return $this->ofertes;
    }

    public function addOferta(Oferta $oferta): self
    {
        if (!$this->ofertes->contains($oferta)) {
            $this->ofertes[] = $oferta;
            $oferta->setEmpresa($this);
        }

        return $this;
    }

    public function removeOferta(Oferta $oferta): self
    {
        if ($this->ofertes->contains($oferta)) {
            $this->ofertes->removeElement($oferta);
            if ($oferta->getEmpresa() === $this) {
                $oferta->setEmpresa(null);
            }
        }

        return $this;
    }
}
