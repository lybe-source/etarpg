<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTrait;
use App\Entity\Traits\UpdatedAtTrait;
use App\Repository\ItemsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: ItemsRepository::class)]
#[ORM\Table(name: '`items`', options: ["collate" => "utf8mb4_general_ci"])]
#[Vich\Uploadable]
class Items
{
    use CreatedAtTrait;
    use UpdatedAtTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(type: 'integer')]
    private ?int $score = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $filename = null;

    #[Vich\UploadableField(mapping: 'item_image', fileNameProperty: 'filename')]
    private ?File $imageFile = null;

    #[ORM\ManyToOne(inversedBy: 'items')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $category = null;

    #[ORM\ManyToOne(inversedBy: 'items')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Rarity $rarity = null;

    #[ORM\ManyToOne(inversedBy: 'items')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Statistics $stat = null;

    #[ORM\OneToMany(mappedBy: 'items', targetEntity: InventoryItems::class)]
    private Collection $inventoryItems;

    public function __construct()
    {
        $this->created_at = new \DateTimeImmutable();
        $this->updated_at = new \DateTimeImmutable();
        $this->inventoryItems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(?int $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageFile(?File $imageFile): void
    {
        $this->imageFile = $imageFile;

        if ($this->imageFile instanceof UploadedFile) {
            $this->updated_at = new \DateTimeImmutable();
        }
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(?string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getRarity(): ?Rarity
    {
        return $this->rarity;
    }

    public function setRarity(?Rarity $rarity): static
    {
        $this->rarity = $rarity;

        return $this;
    }
    
    public function getStat(): ?Statistics
    {
        return $this->stat;
    }

    public function setStat(?Statistics $stat): static
    {
        $this->stat = $stat;

        return $this;
    }

    /**
     * @return Collection<int, InventoryItems>
     */
    public function getInventoryItems(): Collection
    {
        return $this->inventoryItems;
    }

    public function addInventoryItem(InventoryItems $inventoryItem): static
    {
        if (!$this->inventoryItems->contains($inventoryItem)) {
            $this->inventoryItems->add($inventoryItem);
            $inventoryItem->setItems($this);
        }

        return $this;
    }

    public function removeInventoryItem(InventoryItems $inventoryItem): static
    {
        if ($this->inventoryItems->removeElement($inventoryItem)) {
            // set the owning side to null (unless already changed)
            if ($inventoryItem->getItems() === $this) {
                $inventoryItem->setItems(null);
            }
        }

        return $this;
    }
}
