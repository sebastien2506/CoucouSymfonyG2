<?php

namespace App\Entity;

use App\Repository\SectionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SectionRepository::class)]
class Section
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
    private ?string $sectionTitel = null;

    #[ORM\Column(length: 600, nullable: true)]
    private ?string $sectionDescription = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSectionTitel(): ?string
    {
        return $this->sectionTitel;
    }

    public function setSectionTitel(string $sectionTitel): static
    {
        $this->sectionTitel = $sectionTitel;

        return $this;
    }

    public function getSectionDescription(): ?string
    {
        return $this->sectionDescription;
    }

    public function setSectionDescription(?string $sectionDescription): static
    {
        $this->sectionDescription = $sectionDescription;

        return $this;
    }
}
