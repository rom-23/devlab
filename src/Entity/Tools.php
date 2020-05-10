<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use DateTime;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ToolsRepository")
 * @ApiResource(
 *     normalizationContext={"groups"={"tools:read"}},
 *     denormalizationContext={"groups"={"tools:write"}}
 *     )
 * @Vich\Uploadable()
 */
class Tools
{
  /**
   * @ORM\Id()
   * @ORM\GeneratedValue()
   * @ORM\Column(type="integer")
   * @Groups({"tools:read", "project:read"})
   */
  private $id;

  /**
   * @ORM\Column(type="string", length=255)
   * @Groups({"tools:read", "project:read"})
   */
  private $toolName;

  /**
   * @ORM\Column(type="datetime")
   * @Groups({"global-search:read", "project:read"})
   */
  private $createdAt;

  /**
   * @ORM\Column(type="datetime")
   */
  private $updatedAt;

  /**
   * @ORM\ManyToMany(targetEntity="App\Entity\Project", mappedBy="tools", cascade={"persist"})
   * @Groups({"tools:read"})
   */
  private $project;

  /**
   * @var string|null
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  private $image;

  /**
   * @Vich\UploadableField(mapping="tools_images", fileNameProperty="image")
   */
  private $imageFile;

  public function __construct()
  {
    $this->project = new ArrayCollection();
    $this->createdAt = new DateTime();
    $this->updatedAt = new DateTime();
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

  public function getUpdatedAt(): ?\DateTimeInterface
  {
      return $this->updatedAt;
  }

  public function setUpdatedAt(\DateTimeInterface $updatedAt): self
  {
      $this->updatedAt = $updatedAt;

      return $this;
  }

  /**
   * @param File|null $imageFile
   * @return Tools
   * @throws Exception
   */
  public function setImageFile(?File $imageFile = null)
  {
    $this->imageFile = $imageFile;
    if ($this->imageFile instanceof UploadedFile) {
      $this->updatedAt = new \DateTime('now');
    }
    return $this;
  }

  public function getImageFile()
  {
    return $this->imageFile;
  }

  public function getImage(): ?string
  {
      return $this->image;
  }

  public function setImage(?string $image): self
  {
      $this->image = $image;

      return $this;
  }

  public function getId(): ?int
  {
      return $this->id;
  }

  public function getToolName(): ?string
  {
      return $this->toolName;
  }

  public function setToolName(string $toolName): self
  {
      $this->toolName = $toolName;

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
          $project->addTool($this);
      }

      return $this;
  }

  public function removeProject(Project $project): self
  {
      if ($this->project->contains($project)) {
          $this->project->removeElement($project);
          $project->removeTool($this);
      }

      return $this;
  }

  public function __toString()
  {
    return $this->getToolName();
  }
}
