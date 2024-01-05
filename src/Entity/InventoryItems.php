<?php

namespace App\Entity;

use App\Repository\InventoryItemsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InventoryItemsRepository::class)]
#[ORM\Table(name: '`inventory_items`', options: ["collate" => "utf8mb4_general_ci"])]
class InventoryItems
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'inventoryItems')]
    private ?Inventory $inventory = null;

    #[ORM\ManyToOne(inversedBy: 'inventoryItems')]
    private ?Items $items = null;

    #[ORM\Column]
    private ?bool $is_used = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInventory(): ?Inventory
    {
        return $this->inventory;
    }

    public function setInventory(?Inventory $inventory): static
    {
        $this->inventory = $inventory;

        return $this;
    }

    public function getItems(): ?Items
    {
        return $this->items;
    }

    public function setItems(?Items $items): static
    {
        $this->items = $items;

        return $this;
    }

    public function isIsUsed(): ?bool
    {
        return $this->is_used;
    }

    public function setIsUsed(bool $is_used): static
    {
        $this->is_used = $is_used;

        return $this;
    }
}
