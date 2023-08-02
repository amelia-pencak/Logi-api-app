<?php

namespace App\Entity;

use App\Repository\TokenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TokenRepository::class)]
class Token
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 1000)]
    private ?string $token = null;

    #[ORM\OneToMany(mappedBy: 'id_tokenu', targetEntity: Wiadomosc::class, orphanRemoval: true)]
    private Collection $id_Tokenow;

    public function __construct()
    {
        $this->id_Tokenow = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection<int, Wiadomosc>
     */
    public function getIdTokenow(): Collection
    {
        return $this->id_Tokenow;
    }

    public function addIdTokenow(Wiadomosc $idTokenow): static
    {
        if (!$this->id_Tokenow->contains($idTokenow)) {
            $this->id_Tokenow->add($idTokenow);
            $idTokenow->setIdTokenu($this);
        }

        return $this;
    }

    public function removeIdTokenow(Wiadomosc $idTokenow): static
    {
        if ($this->id_Tokenow->removeElement($idTokenow)) {
            // set the owning side to null (unless already changed)
            if ($idTokenow->getIdTokenu() === $this) {
                $idTokenow->setIdTokenu(null);
            }
        }

        return $this;
    }
}
