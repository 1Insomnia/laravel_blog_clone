<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @var ?int $id
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @var string $email
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private string $email;

    /**
     * @var string $username
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private string $username;

    /**
     * @var Collection $posts
     * @ORM\OneToMany(targetEntity=Post::class, mappedBy="author")
     */
    private Collection $posts;

    #[Pure] public function __construct()
    {
        $this->posts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return Collection|array
     */
    public function getPosts(): Collection|array
    {
        return $this->posts;
    }
}
