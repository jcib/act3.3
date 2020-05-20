<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OfertaRepository")
 */
class Oferta
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
    private $descripcio;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dataPub;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $titol;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Empresa", inversedBy="ofertes")
     */
    private $empresa;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Candidat", inversedBy="ofertes")
     */
    private $candidat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescripcio(): ?string
    {
        return $this->descripcio;
    }

    public function setDescripcio(?string $descripcio): self
    {
        $this->descripcio = $descripcio;

        return $this;
    }

    public function getDataPub(): ?\DateTimeInterface
    {
        return $this->dataPub;
    }

    public function setDataPub(?\DateTimeInterface $dataPub): self
    {
        $this->dataPub = $dataPub;

        return $this;
    }

    public function getTitol(): ?string
    {
        return $this->titol;
    }

    public function setTitol(?string $titol): self
    {
        $this->titol = $titol;

        return $this;
    }

    public function getEmpresa(): ?Empresa
    {
        return $this->empresa;
    }

    public function setEmpresa(?Empresa $empresa): self
    {
        $this->empresa = $empresa;

        return $this;
    }

    public function getCandidat(): ?Candidat
    {
        return $this->candidat;
    }

    public function setCandidat(?Candidat $candidat): self
    {
        $this->candidat = $candidat;

        return $this;
    }
}
