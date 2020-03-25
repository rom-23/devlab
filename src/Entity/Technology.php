<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;
/**
 * @ORM\Entity(repositoryClass="App\Repository\TechnologyRepository")
 * @ApiResource
 */
class Technology
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups("project:read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("project:read")
     */
    private $technoName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("project:read")
     */
    private $technoDesc;

    /**
     * @ORM\Column(type="datetime")
     * @Groups("project:read")
     */
    private $createdAt;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Project", inversedBy="technologies")
     */
    private $project;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="technology")
     * @ORM\JoinColumn(nullable=false)
     * @Groups("project:read")
     */
    private $category;

    public function __construct()
    {
        $this->project = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTechnoName(): ?string
    {
        return $this->technoName;
    }

    public function setTechnoName(string $technoName): self
    {
        $this->technoName = $technoName;

        return $this;
    }

    public function getTechnoDesc(): ?string
    {
        return $this->technoDesc;
    }

    public function setTechnoDesc(?string $technoDesc): self
    {
        $this->technoDesc = $technoDesc;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection|Project[]
     */
    public function getProject(): Collection
    {
        return $this->project;
    }

    public function addProject(Project $project): self
    {
        if (!$this->project->contains($project)) {
            $this->project[] = $project;
        }

        return $this;
    }

    public function removeProject(Project $project): self
    {
        if ($this->project->contains($project)) {
            $this->project->removeElement($project);
        }

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
}
