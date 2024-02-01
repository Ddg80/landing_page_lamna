<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\TimeStampable;
use App\Repository\AddresseRepository;

#[ORM\Entity(repositoryClass: AddresseRepository::class)]
#[ORM\Table(name: '`addresses`')]
#[ORM\HasLifecycleCallbacks]
class Addresse
{

    use TimeStampable;
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function __toString()
    {
        return $this->email;
    }
}
