<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTrait;
use App\Entity\Traits\UpdatedAtTrait;
use App\Repository\RarityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RarityRepository::class)]
class Rarity
{
    use CreatedAtTrait;
    use UpdatedAtTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $drop_rate = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'rarity', targetEntity: Helmet::class)]
    private Collection $helmets;

    #[ORM\OneToMany(mappedBy: 'rarity', targetEntity: Amulet::class)]
    private Collection $amulets;

    #[ORM\OneToMany(mappedBy: 'rarity', targetEntity: Chest::class)]
    private Collection $chests;

    #[ORM\OneToMany(mappedBy: 'rarity', targetEntity: Belt::class)]
    private Collection $belts;

    #[ORM\OneToMany(mappedBy: 'rarity', targetEntity: Glove::class)]
    private Collection $gloves;

    #[ORM\OneToMany(mappedBy: 'rarity', targetEntity: Trouser::class)]
    private Collection $trousers;

    #[ORM\OneToMany(mappedBy: 'rarity', targetEntity: Boot::class)]
    private Collection $boots;

    #[ORM\OneToMany(mappedBy: 'rarity', targetEntity: Weapon::class)]
    private Collection $weapons;

    #[ORM\OneToMany(mappedBy: 'rarity', targetEntity: Shield::class)]
    private Collection $shields;

    #[ORM\OneToMany(mappedBy: 'rarity', targetEntity: Ring::class)]
    private Collection $rings;

    public function __construct()
    {
        $this->created_at = new \DateTimeImmutable();
        $this->updated_at = new \DateTimeImmutable();
        $this->helmets = new ArrayCollection();
        $this->amulets = new ArrayCollection();
        $this->chests = new ArrayCollection();
        $this->belts = new ArrayCollection();
        $this->gloves = new ArrayCollection();
        $this->trousers = new ArrayCollection();
        $this->boots = new ArrayCollection();
        $this->weapons = new ArrayCollection();
        $this->shields = new ArrayCollection();
        $this->rings = new ArrayCollection();
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
    
    public function getDropRate(): ?int
    {
        return $this->drop_rate;
    }

    public function setDropRate(int $drop_rate): static
    {
        $this->drop_rate = $drop_rate;

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

    /**
     * @return Collection<int, Helmet>
     */
    public function getHelmets(): Collection
    {
        return $this->helmets;
    }

    public function addHelmet(Helmet $helmets): static
    {
        if (!$this->helmets->contains($helmets)) {
            $this->helmets->add($helmets);
            $helmets->setRarity($this);
        }

        return $this;
    }

    public function removeHelmet(Helmet $helmets): static
    {
        if ($this->helmets->removeElement($helmets)) {
            // set the owning side to null (unless already changed)
            if ($helmets->getRarity() === $this) {
                $helmets->setRarity(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Amulet>
     */
    public function getAmulets(): Collection
    {
        return $this->amulets;
    }

    public function addAmulet(Amulet $amulet): static
    {
        if (!$this->amulets->contains($amulet)) {
            $this->amulets->add($amulet);
            $amulet->setRarity($this);
        }

        return $this;
    }

    public function removeAmulet(Amulet $amulet): static
    {
        if ($this->amulets->removeElement($amulet)) {
            // set the owning side to null (unless already changed)
            if ($amulet->getRarity() === $this) {
                $amulet->setRarity(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Chest>
     */
    public function getChests(): Collection
    {
        return $this->chests;
    }

    public function addChest(Chest $chest): static
    {
        if (!$this->chests->contains($chest)) {
            $this->chests->add($chest);
            $chest->setRarity($this);
        }

        return $this;
    }

    public function removeChest(Chest $chest): static
    {
        if ($this->chests->removeElement($chest)) {
            // set the owning side to null (unless already changed)
            if ($chest->getRarity() === $this) {
                $chest->setRarity(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Belt>
     */
    public function getBelts(): Collection
    {
        return $this->belts;
    }

    public function addBelt(Belt $belt): static
    {
        if (!$this->belts->contains($belt)) {
            $this->belts->add($belt);
            $belt->setRarity($this);
        }

        return $this;
    }

    public function removeBelt(Belt $belt): static
    {
        if ($this->belts->removeElement($belt)) {
            // set the owning side to null (unless already changed)
            if ($belt->getRarity() === $this) {
                $belt->setRarity(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Glove>
     */
    public function getGloves(): Collection
    {
        return $this->gloves;
    }

    public function addGlove(Glove $glove): static
    {
        if (!$this->gloves->contains($glove)) {
            $this->gloves->add($glove);
            $glove->setRarity($this);
        }

        return $this;
    }

    public function removeGlove(Glove $glove): static
    {
        if ($this->gloves->removeElement($glove)) {
            // set the owning side to null (unless already changed)
            if ($glove->getRarity() === $this) {
                $glove->setRarity(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Trouser>
     */
    public function getTrousers(): Collection
    {
        return $this->trousers;
    }

    public function addTrousers(Trouser $trousers): static
    {
        if (!$this->trousers->contains($trousers)) {
            $this->trousers->add($trousers);
            $trousers->setRarity($this);
        }

        return $this;
    }

    public function removeTrousers(Trouser $trousers): static
    {
        if ($this->trousers->removeElement($trousers)) {
            // set the owning side to null (unless already changed)
            if ($trousers->getRarity() === $this) {
                $trousers->setRarity(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Boot>
     */
    public function getBoots(): Collection
    {
        return $this->boots;
    }

    public function addBoot(Boot $boot): static
    {
        if (!$this->boots->contains($boot)) {
            $this->boots->add($boot);
            $boot->setRarity($this);
        }

        return $this;
    }

    public function removeBoot(Boot $boot): static
    {
        if ($this->boots->removeElement($boot)) {
            // set the owning side to null (unless already changed)
            if ($boot->getRarity() === $this) {
                $boot->setRarity(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Weapon>
     */
    public function getWeapons(): Collection
    {
        return $this->weapons;
    }

    public function addWeapon(Weapon $weapon): static
    {
        if (!$this->weapons->contains($weapon)) {
            $this->weapons->add($weapon);
            $weapon->setRarity($this);
        }

        return $this;
    }

    public function removeWeapon(Weapon $weapon): static
    {
        if ($this->weapons->removeElement($weapon)) {
            // set the owning side to null (unless already changed)
            if ($weapon->getRarity() === $this) {
                $weapon->setRarity(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Shield>
     */
    public function getShields(): Collection
    {
        return $this->shields;
    }

    public function addShield(Shield $shield): static
    {
        if (!$this->shields->contains($shield)) {
            $this->shields->add($shield);
            $shield->setRarity($this);
        }

        return $this;
    }

    public function removeShield(Shield $shield): static
    {
        if ($this->shields->removeElement($shield)) {
            // set the owning side to null (unless already changed)
            if ($shield->getRarity() === $this) {
                $shield->setRarity(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Ring>
     */
    public function getRings(): Collection
    {
        return $this->rings;
    }

    public function addRing(Ring $ring): static
    {
        if (!$this->rings->contains($ring)) {
            $this->rings->add($ring);
            $ring->setRarity($this);
        }

        return $this;
    }

    public function removeRing(Ring $ring): static
    {
        if ($this->rings->removeElement($ring)) {
            // set the owning side to null (unless already changed)
            if ($ring->getRarity() === $this) {
                $ring->setRarity(null);
            }
        }

        return $this;
    }
}
