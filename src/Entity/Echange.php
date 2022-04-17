<?php

namespace App\Entity;

use App\Repository\EchangeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EchangeRepository::class)
 */
class Echange
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $idechange;

    /**
     * @ORM\Column(type="integer")
     */
    private $idmembre1;

    /**
     * @ORM\Column(type="integer")
     */
    private $idmembre2;

    /**
     * @ORM\Column(type="integer")
     */
    private $idarticle1;

    /**
     * @ORM\Column(type="integer")
     */
    private $idarticle2;

    /**
     * @ORM\Column(type="integer")
     */
    private $etat;

    public function getIdechange(): ?int
    {
        return $this->idechange;
    }

    public function getIdmembre1(): ?int
    {
        return $this->idmembre1;
    }

    public function setIdmembre1(int $idmembre1): self
    {
        $this->idmembre1 = $idmembre1;

        return $this;
    }

    public function getIdmembre2(): ?int
    {
        return $this->idmembre2;
    }

    public function setIdmembre2(int $idmembre2): self
    {
        $this->idmembre2 = $idmembre2;

        return $this;
    }

    public function getIdarticle1(): ?int
    {
        return $this->idarticle1;
    }

    public function setIdarticle1(int $idarticle1): self
    {
        $this->idarticle1 = $idarticle1;

        return $this;
    }

    public function getIdarticle2(): ?int
    {
        return $this->idarticle2;
    }

    public function setIdarticle2(int $idarticle2): self
    {
        $this->idarticle2 = $idarticle2;

        return $this;
    }

    public function getEtat(): ?int
    {
        return $this->etat;
    }

    public function setEtat(int $etat): self
    {
        $this->etat = $etat;

        return $this;
    }
}
