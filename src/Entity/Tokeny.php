<?php

namespace App\Entity;

use App\Repository\TokenyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TokenyRepository::class)]
class Tokeny
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_tokenu = null;

    #[ORM\Column(length: 1000)]
    private ?string $token = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdTokenu(): ?int
    {
        return $this->id_tokenu;
    }

    public function setIdTokenu(int $id_tokenu): static
    {
        $this->id_tokenu = $id_tokenu;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(string $token): static
    {
        $this->token = $token;

        return $this;
    }
}
