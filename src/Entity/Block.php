<?php

namespace App\Entity;

use App\Repository\BlockRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BlockRepository::class)]
class Block
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $index = null;

    #[ORM\Column(length: 255)]
    private ?string $hash = null;

    #[ORM\Column(length: 255)]
    private ?string $prevHash = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $timestamp = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $data = null;

    public function __construct(int $index, string $previousHash, string $data)
    {
        $this->index = $index;
        $this->previousHash = $previousHash;
        $this->data = $data;
        $this->timestamp = time();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIndex(): ?int
    {
        return $this->index;
    }

    public function setIndex(int $index): static
    {
        $this->index = $index;

        return $this;
    }

    public function getHash(): ?string
    {
        return $this->hash;
    }

    public function setHash(string $hash): static
    {
        $this->hash = $hash;

        return $this;
    }

    public function getPrevHash(): ?string
    {
        return $this->prevHash;
    }

    public function setPrevHash(string $prevHash): static
    {
        $this->prevHash = $prevHash;

        return $this;
    }

    public function getTimestamp(): ?\DateTimeInterface
    {
        return $this->timestamp;
    }

    public function setTimestamp(\DateTimeInterface $timestamp): static
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    public function getData(): ?string
    {
        return $this->data;
    }

    public function setData(?string $data): static
    {
        $this->data = $data;

        return $this;
    }
}
