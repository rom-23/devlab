<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectRepository")
 * @ApiResource(
 *     normalizationContext={"groups"={"project:read"}},
 *     denormalizationContext={"groups"={"project:write"}}
 *     )
 */
class Project
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"project:read","global-search:read", "tools:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"project:read","global-search:read","tools:read"})
     */
    private $projectName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"project:read"})
     */
    private $projectDesc;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"project:read"})
     */
    private $createdAt;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Tools", mappedBy="project")
     * @Groups({"project:read"})
     */
    private $tools;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Technology", mappedBy="project")
     * @Groups({"project:read"})
     */
    private $technologies;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Picture", mappedBy="project")
     * @Groups({"project:read"})
     */
    private $pictures;

    public function __construct()
    {
        $this->tools = new ArrayCollection();
        $this->technologies = new ArrayCollection();
        $this->pictures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProjectName(): ?string
    {
        return $this->projectName;
    }

    public function setProjectName(string $projectName): self
    {
        $this->projectName = $projectName;

        return $this;
    }

    public function getProjectDesc(): ?string
    {
        return $this->projectDesc;
    }

    public function setProjectDesc(?string $projectDesc): self
    {
        $this->projectDesc = $projectDesc;

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
     * @return Collection|Tools[]
     */
    public function getTools(): Collection
    {
        return $this->tools;
    }

    public function addTool(Tools $tool): self
    {
        if (!$this->tools->contains($tool)) {
            $this->tools[] = $tool;
            $tool->addProject($this);
        }

        return $this;
    }

    public function removeTool(Tools $tool): self
    {
        if ($this->tools->contains($tool)) {
            $this->tools->removeElement($tool);
            $tool->removeProject($this);
        }

        return $this;
    }

    /**
     * @return Collection|Technology[]
     */
    public function getTechnologies(): Collection
    {
        return $this->technologies;
    }

    public function addTechnology(Technology $technology): self
    {
        if (!$this->technologies->contains($technology)) {
            $this->technologies[] = $technology;
            $technology->addProject($this);
        }

        return $this;
    }

    public function removeTechnology(Technology $technology): self
    {
        if ($this->technologies->contains($technology)) {
            $this->technologies->removeElement($technology);
            $technology->removeProject($this);
        }

        return $this;
    }

    /**
     * @return Collection|Picture[]
     */
    public function getPictures(): Collection
    {
        return $this->pictures;
    }

    public function addPicture(Picture $picture): self
    {
        if (!$this->pictures->contains($picture)) {
            $this->pictures[] = $picture;
            $picture->addProject($this);
        }

        return $this;
    }

    public function removePicture(Picture $picture): self
    {
        if ($this->pictures->contains($picture)) {
            $this->pictures->removeElement($picture);
            $picture->removeProject($this);
        }

        return $this;
    }
}
