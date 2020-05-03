<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Serializer\Annotation\Groups;

use Symfony\Component\Validator\Constraints as Assert;

use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectRepository")
 * @ApiResource(
 *     normalizationContext={"groups"={"project:read"}},
 *     denormalizationContext={"groups"={"project:write"}}
 *     )
 * @UniqueEntity("projectName")
 * @Vich\Uploadable
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
   * @ORM\ManyToMany(targetEntity="App\Entity\Tools", inversedBy="project")
   * @Groups({"project:read"})
   */
  private $tools;

  /**
   * @ORM\ManyToMany(targetEntity="App\Entity\Technology", inversedBy="project")
   * @Groups({"project:read"})
   */
  private $technologies;

  /**
   * @ORM\ManyToMany(targetEntity="App\Entity\Picture", inversedBy="project")
   * @Groups({"project:read"})
   */
  private $pictures;


  /**
   * @ORM\Column(type="datetime")
   * @var DateTime
   * @Groups({"project:read"})
   */
  private $updatedAt;


  public function __construct()
  {
    $this->tools = new ArrayCollection();
    $this->createdAt = new DateTime();
    $this->updatedAt = new DateTime();
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
      }

      return $this;
  }

  public function removeTool(Tools $tool): self
  {
      if ($this->tools->contains($tool)) {
          $this->tools->removeElement($tool);
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

  /**
   * Set the value of Technologies
   * @param $technologies
   * @return self
   */
  public function setTechnologies($technologies)
  {
    $this->technologies = $technologies;
    return $this;
  }

  public function addTechnology(Technology $technology): self
  {
      if (!$this->technologies->contains($technology)) {
          $this->technologies[] = $technology;
      }

      return $this;
  }

  public function removeTechnology(Technology $technology): self
  {
      if ($this->technologies->contains($technology)) {
          $this->technologies->removeElement($technology);
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
      }

      return $this;
  }

  public function removePicture(Picture $picture): self
  {
      if ($this->pictures->contains($picture)) {
          $this->pictures->removeElement($picture);
      }

      return $this;
  }

  public function __toString()
  {
    return $this->projectName;
  }

}
