<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 * @ApiResource(
 *     normalizationContext={"groups"={"categories:read"}},
 *     denormalizationContext={"groups"={"categories:write"}}
 *     )
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"categories:read", "global-search:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"categories:read", "global-search:read"})
     */
    private $categoryName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"categories:read"})
     */
    private $categoryDesc;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Technology", mappedBy="category")
     * @Groups({"categories:read"})
     */
    private $technology;

    public function __construct()
    {
        $this->technology = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategoryName(): ?string
    {
        return $this->categoryName;
    }

    public function setCategoryName(string $categoryName): self
    {
        $this->categoryName = $categoryName;

        return $this;
    }

    public function getCategoryDesc(): ?string
    {
        return $this->categoryDesc;
    }

    public function setCategoryDesc(?string $categoryDesc): self
    {
        $this->categoryDesc = $categoryDesc;

        return $this;
    }

    /**
     * @return Collection|Technology[]
     */
    public function getTechnology(): Collection
    {
        return $this->technology;
    }

    public function addTechnology(Technology $technology): self
    {
        if (!$this->technology->contains($technology)) {
            $this->technology[] = $technology;
            $technology->setCategory($this);
        }

        return $this;
    }

    public function removeTechnology(Technology $technology): self
    {
        if ($this->technology->contains($technology)) {
            $this->technology->removeElement($technology);
            // set the owning side to null (unless already changed)
            if ($technology->getCategory() === $this) {
                $technology->setCategory(null);
            }
        }

        return $this;
    }
  public function __toString()
  {
    return $this->categoryName;
  }
}
