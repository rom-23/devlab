<?php

namespace App\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
/**
 * @ORM\Entity(repositoryClass="App\Repository\AttachmentRepository")
 * @Vich\Uploadable()
 */
class Attachment
{
  /**
   * @ORM\Id()
   * @ORM\GeneratedValue()
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @var string|null
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  private $image;

  /**
   * @ORM\Column(type="datetime")
   */
  private $createdAt;

  /**
   * @ORM\Column(type="datetime")
   */
  private $updatedAt;

  /**
   * @ORM\ManyToMany(targetEntity="App\Entity\Project", mappedBy="attachments", cascade={"persist"})
   */
  private $projects;

  /**
   * @Vich\UploadableField(mapping="project_images", fileNameProperty="image")
   */
  private $imageFile;

  public function __construct()
  {
    $this->projects = new ArrayCollection();
    $this->createdAt = new DateTime();
    $this->updatedAt = new DateTime();
  }


  /**
   * @param File|null $imageFile
   * @return Attachment
   * @throws Exception
   */
  public function setImageFile( ?File $imageFile = null)
  {
    $this -> imageFile = $imageFile;
    if ($this -> imageFile instanceof UploadedFile) {
      $this->updatedAt = new \DateTime('now');
    }
    return $this;
  }


  public function getImageFile()
  {
    return $this -> imageFile;
  }

  public function getId(): ?int
  {
      return $this->id;
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
   * @return Collection|Project[]
   */
  public function getProjects(): Collection
  {
      return $this->projects;
  }

  public function addProject(Project $project): self
  {
      if (!$this->projects->contains($project)) {
          $this->projects[] = $project;
          $project->addAttachment($this);
      }

      return $this;
  }

  public function removeProject(Project $project): self
  {
      if ($this->projects->contains($project)) {
          $this->projects->removeElement($project);
          $project->removeAttachment($this);
      }

      return $this;
  }

  public function __toString()
  {
    return $this->image;
  }
}
