<?php

namespace App\Entity;

use App\Repository\MediaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediaRepository::class)]
class Media
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'Media')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Trick $trick = null;

    #[ORM\Column(length: 100)]
    private ?string $type = null;

    #[ORM\Column(length: 255, nullable: false)]
    private ?string $content = null;

    #[ORM\Column(type: "boolean", nullable: false, options:['default' => false ])]
    private ?string $isFeaturedImage = null;

    #[ORM\Column(type: "string", nullable: true, options:['default' => false ])]
    private ?string $thumbnail = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTrick(): ?Trick
    {
        return $this->trick;
    }

    public function setTrick(?Trick $trick): self
    {
        $this->trick = $trick;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string|null $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getIsFeaturedImage(): ?bool
    {
        return $this->isFeaturedImage;
    }

    public function setIsFeaturedImage(string|null $isFeaturedImage): self
    {
        $this->isFeaturedImage = $isFeaturedImage;

        return $this;
    }

    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }

    public function setThumbnail(string|null $thumbnail): self
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

}
