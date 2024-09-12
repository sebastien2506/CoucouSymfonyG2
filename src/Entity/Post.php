<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PostRepository::class)]
class Post
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(
        options: [
            'unsigned' => true,
        ],
    )]
    private ?int $id = null;

    #[ORM\Column(length: 160)]
    private ?string $postTitel = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $postDescription = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE,
    options : [
        'default' => 'CURRENT_TIMESTAMP'
    ]
    )]
    private ?\DateTimeInterface $postDateCreated = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $postDatepublished = null;

    #[ORM\Column]
    private ?bool $postPublished = null;

    /**
     * @var Collection<int, section>
     */
    #[ORM\ManyToMany(targetEntity: section::class, inversedBy: 'posts')]
    private Collection $sections;

    public function __construct()
    {
        $this->sections = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPostTitel(): ?string
    {
        return $this->postTitel;
    }

    public function setPostTitel(string $postTitel): static
    {
        $this->postTitel = $postTitel;

        return $this;
    }

    public function getPostDescription(): ?string
    {
        return $this->postDescription;
    }

    public function setPostDescription(string $postDescription): static
    {
        $this->postDescription = $postDescription;

        return $this;
    }

    public function getPostDateCreated(): ?\DateTimeInterface
    {
        return $this->postDateCreated;
    }

    public function setPostDateCreated(\DateTimeInterface $postDateCreated): static
    {
        $this->postDateCreated = $postDateCreated;

        return $this;
    }

    public function getPostDatepublished(): ?\DateTimeInterface
    {
        return $this->postDatepublished;
    }

    public function setPostDatepublished(?\DateTimeInterface $postDatepublished): static
    {
        $this->postDatepublished = $postDatepublished;

        return $this;
    }

    public function isPostPublished(): ?bool
    {
        return $this->postPublished;
    }

    public function setPostPublished(bool $postPublished): static
    {
        $this->postPublished = $postPublished;

        return $this;
    }

    /**
     * @return Collection<int, section>
     */
    public function getSections(): Collection
    {
        return $this->sections;
    }

    public function addSection(section $section): static
    {
        if (!$this->sections->contains($section)) {
            $this->sections->add($section);
        }

        return $this;
    }

    public function removeSection(section $section): static
    {
        $this->sections->removeElement($section);

        return $this;
    }
}
