<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Symfony\Component\Serializer\Annotation\Groups;
use DateTime;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PictureRepository")
 * @ApiResource(
 *     normalizationContext={"groups"={"pictures:read"}},
 *     denormalizationContext={"groups"={"pictures:write"}}
 *     )
 * @Vich\Uploadable
 */
class Picture
{
  /**
   * @ORM\Id()
   * @ORM\GeneratedValue()
   * @ORM\Column(type="integer")
   * @Groups({"pictures:read","project:read"})
   */
  private $id;

  /**
   * @ORM\Column(type="string", length=255)
   * @Groups({"pictures:read", "project:read"})
   */
  private $pictureFile;

  /**
   * @ORM\Column(type="datetime")
   */
  private $createdAt;

  /**
   * @ORM\Column(type="datetime")
   */
  private $updatedAt;

  /**
   * @Assert\Image(mimeTypes="image/jpeg")
   * @Vich\UploadableField(mapping="project_images", fileNameProperty="pictureFile")
   * @var File
   */
  private $imageFile;

  /**
   * @ORM\ManyToMany(targetEntity="App\Entity\Project", mappedBy="pictures")
   * @Groups({"pictures:read"})
   */
  private $project;

  public function __construct()
  {
    $this->project = new ArrayCollection();
    $this->createdAt = new DateTime();
    $this->updatedAt = new DateTime();
  }

  public function getId(): ?int
  {
    return $this->id;
  }


  /**
   *
   * @param File|null $imageFile
   * @return Picture
   * @throws Exception
   */
  public function setImageFile( ?File $imageFile = null)
  {
    $this -> imageFile = $imageFile;
    if ($imageFile) {
      $this->updatedAt = new \DateTime('now');
    }
    return $this;
  }

  /**
   * Get the value of Image File
   * @return File
   */
  public function getImageFile()
  {
    return $this -> imageFile;
  }

  public function getPictureFile(): ?string
  {
    return $this->pictureFile;
  }

  public function setPictureFile(string $pictureFile): self
  {
    $this->pictureFile = $pictureFile;

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
  public function getProject(): Collection
  {
    return $this->project;
  }

  public function addProject(Project $project): self
  {
    if (!$this->project->contains($project)) {
      $this->project[] = $project;
      $project->addPicture($this);
    }

    return $this;
  }

  public function removeProject(Project $project): self
  {
    if ($this->project->contains($project)) {
      $this->project->removeElement($project);
      $project->removePicture($this);
    }

    return $this;
  }

  public function __toString()
  {
    return $this->pictureFile;
  }
}
