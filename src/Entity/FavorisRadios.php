<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FavorisRadios
 *
 * @ORM\Table(name="favoris_radios")
 * @ORM\Entity
 */
class FavorisRadios
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="id_user", type="string", length=255, nullable=true)
     */
    private $idUser;

    /**
     * @var string|null
     *
     * @ORM\Column(name="id_radio", type="string", length=255, nullable=true)
     */
    private $idRadio;

    /**
     * @var string|null
     *
     * @ORM\Column(name="id_channel", type="string", length=255, nullable=true)
     */
    private $idChannel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?string
    {
        return $this->idUser;
    }

    public function setIdUser(?string $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getIdRadio(): ?string
    {
        return $this->idRadio;
    }

    public function setIdRadio(?string $idRadio): self
    {
        $this->idRadio = $idRadio;

        return $this;
    }

    public function getIdChannel(): ?string
    {
        return $this->idChannel;
    }

    public function setIdChannel(?string $idChannel): self
    {
        $this->idChannel = $idChannel;

        return $this;
    }


}
