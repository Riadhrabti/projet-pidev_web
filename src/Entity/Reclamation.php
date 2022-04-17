<?php

namespace App\Entity;

use App\Repository\ReclamationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ReclamationRepository::class)
 */
class Reclamation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="this field should not be blank")
     */
    private $idmembre;

    /**
     * @ORM\Column(type="string",length=255)
     * @Assert\NotBlank(message="this field should not be blank")
     */
    private $Daterec;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="this field should not be blank")
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="this field should not be blank")
     */
    private $idechange;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="this field should not be blank")
     */
    private $etat;

    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getIdmembre(): ?int
    {
        return $this->idmembre;
    }

    public function setIdmembre(int $idmembre): self
    {
        $this->idmembre = $idmembre;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDaterec()
    {
        return $this->Daterec;
    }

    /**
     * @param mixed $Daterec
     */
    public function setDaterec($Daterec): void
    {
        $this->Daterec = $Daterec;
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

    public function getIdechange(): ?int
    {
        return $this->idechange;
    }

    public function setIdechange(int $idechange): self
    {
        $this->idechange = $idechange;

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
