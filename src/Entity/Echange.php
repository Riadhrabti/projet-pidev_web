<?php

namespace App\Entity;

use App\Repository\EchangeRepository;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=EchangeRepository::class)
 */
class Echange
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="this field should not be blank")
     */
    private $idechange;
    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="this field should not be blank")
     */
    private $idmembre1;
    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="this field should not be blank")
     */
    private $idmembre2;
    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="this field should not be blank")
     */
    private $idarticle1;
    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="this field should not be blank")
     */
    private $idarticle2;
    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="this field should not be blank")
     */
    private $etat;

    public function construct()
    {

    }

    public function getIdechange()
    {
        return $this->idechange;
    }

    public function setIdechange(Integer $idechange)
    {
        $this->idechange = $idechange;

        return $this;
    }
    public function getIdmembre1()
    {
        return $this->idmembre1;
    }

    public function setIdmembre1(Integer $idmembre1)
    {
        $this->idmembre1 = $idmembre1;

        return $this;
    }
    public function getIdmembre2()
    {
        return $this->idmembre2;
    }

    public function setIdmembre2(Integer $idmembre2)
    {
        $this->idmembre2= $idmembre2;

        return $this;
    }

    public function getIdarticle1()
    {
        return $this->idarticle1;
    }

    public function setIdarticle1(Integer $idarticle1)
    {
        $this->idarticle1 = $idarticle1;

        return $this;
    }
    public function getIdarticle2()
    {
        return $this->idarticle2;
    }

    public function setIdarticle2(Integer $idarticle2)
    {
        $this->idarticle2 = $idarticle2;

        return $this;
    }
    public function getetat()
    {
        return $this->etat;
    }

    public function setetat(Integer $etat)
    {
        $this->etat = $etat;

        return $this;
    }





}




