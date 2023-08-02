<?php

namespace App\Entity;

use App\Repository\WiadomoscRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WiadomoscRepository::class)]
class Wiadomosc
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $data_wyslania = null;

    #[ORM\Column]
    private ?bool $status = null;

    #[ORM\Column(length: 2000, nullable: true)]
    private ?string $logi = null;

    #[ORM\ManyToOne(inversedBy: 'id_Tokenow')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Token $id_tokenu = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDataWyslania(): ?\DateTimeInterface
    {
        return $this->data_wyslania;
    }

    public function setDataWyslania(\DateTimeInterface $data_wyslania): static
    {
        $this->data_wyslania = $data_wyslania;

        return $this;
    }

    public function isStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getLogi(): ?string
    {
        return $this->logi;
    }

    public function setLogi(?string $logi): static
    {
        $this->logi = $logi;

        return $this;
    }

    public function getIdTokenu(): ?Token
    {
        return $this->id_tokenu;
    }

    public function setIdTokenu(?Token $id_tokenu): static
    {
        $this->id_tokenu = $id_tokenu;

        return $this;
    }
}
