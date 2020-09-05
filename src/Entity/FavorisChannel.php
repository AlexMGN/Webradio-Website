<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FavorisChannel
 *
 * @ORM\Table(name="favoris_channel")
 * @ORM\Entity
 */
class FavorisChannel
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
     * @var string
     *
     * @ORM\Column(name="id_user", type="string", length=255, nullable=false)
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="id_channel", type="string", length=255, nullable=false)
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

    public function setIdUser(string $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getIdChannel(): ?string
    {
        return $this->idChannel;
    }

    public function setIdChannel(string $idChannel): self
    {
        $this->idChannel = $idChannel;

        return $this;
    }


}
