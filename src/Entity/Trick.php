<?php

namespace App\Entity;

use App\Entity\User;
use App\Entity\Media;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\TrickRepository;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: TrickRepository::class)]
class Trick
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'Trick', fetch: "EAGER")]
    #[ORM\JoinColumn(nullable: false)]
    private ? User $author = null;

    #[ORM\ManyToOne(inversedBy: 'Trick', targetEntity: Category::class, fetch: "EAGER")]
    #[ORM\JoinColumn(nullable: false)]
    private ? Category $category = null;

    #[ORM\Column(length: 100, unique: true)]
    #[Assert\NotBlank()]
    #[Assert\Length(
    min: 2,
    max: 50,
    minMessage: 'Your Trick name must be at least {{ limit }} characters long',
    maxMessage: 'Your Trick name cannot be longer than {{ limit }} characters',
    )]
    private ?string $name = null;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank()]
    private ?string $slug;

    #[Assert\NotBlank()]
    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE, options:['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\OneToMany(mappedBy: 'trick', targetEntity: Comment::class, orphanRemoval: true)]
    private $Comment; //Collection ?

    #[ORM\OneToMany(mappedBy: 'trick', fetch: 'EAGER', targetEntity: Media::class, orphanRemoval: true)]
    private $Media; //Collection ?

    public function __construct()
    {
        $this->Comment = new ArrayCollection();
        $this->Media = new ArrayCollection();
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Comment>
     */
    public function getComment(): Collection
    {
        return $this->Comment;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->Comment->contains($comment)) {
            $this->Comment->add($comment);
            $comment->setTrick($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->Comment->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getTrick() === $this) {
                $comment->setTrick(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Media>
     */
    public function getMedia(): Collection
    {
        return $this->Media;
    }

    public function addMedia(Media $media): self
    {
        if (!$this->Media->contains($media)) {
            $this->Media->add($media);
            $media->setTrick($this);
        }

        return $this;
    }

    public function removeMedia(Media $media): self
    {
        if ($this->Media->removeElement($media)) {
            // set the owning side to null (unless already changed)
            if ($media->getTrick() === $this) {
                $media->setTrick(null);
            }
        }

        return $this;
    }

}
