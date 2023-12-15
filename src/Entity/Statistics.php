<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTrait;
use App\Entity\Traits\UpdatedAtTrait;
use App\Repository\StatisticsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatisticsRepository::class)]
class Statistics
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
    private ?int $amount = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'statistic', targetEntity: Helmet::class)]
    private Collection $helmet;

    #[ORM\OneToMany(mappedBy: 'statistic', targetEntity: Amulet::class)]
    private Collection $amulets;

    #[ORM\OneToMany(mappedBy: 'statistic', targetEntity: Chest::class)]
    private Collection $chests;

    #[ORM\OneToMany(mappedBy: 'statistic', targetEntity: Belt::class)]
    private Collection $belts;

    #[ORM\OneToMany(mappedBy: 'statistic', targetEntity: Glove::class)]
    private Collection $gloves;

    #[ORM\OneToMany(mappedBy: 'statistic', targetEntity: Trouser::class)]
    private Collection $trousers;

    #[ORM\OneToMany(mappedBy: 'statistic', targetEntity: Boot::class)]
    private Collection $boots;

    #[ORM\OneToMany(mappedBy: 'statistic', targetEntity: Weapon::class)]
    private Collection $weapons;

    #[ORM\OneToMany(mappedBy: 'statistic', targetEntity: Shield::class)]
    private Collection $shields;

    #[ORM\OneToMany(mappedBy: 'statistic', targetEntity: Ring::class)]
    private Collection $rings;

    public function __construct()
    {
        $this->created_at = new \DateTimeImmutable();
        $this->updated_at = new \DateTimeImmutable();
        $this->helmet = new ArrayCollection();
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
    
    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): static
    {
        $this->amount = $amount;

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
    public function getHelmet(): Collection
    {
        return $this->helmet;
    }

    public function addHelmet(Helmet $helmet): static
    {
        if (!$this->helmet->contains($helmet)) {
            $this->helmet->add($helmet);
            $helmet->setStatistic($this);
        }

        return $this;
    }

    public function removeHelmet(Helmet $helmet): static
    {
        if ($this->helmet->removeElement($helmet)) {
            // set the owning side to null (unless already changed)
            if ($helmet->getStatistic() === $this) {
                $helmet->setStatistic(null);
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
            $amulet->setStatistic($this);
        }

        return $this;
    }

    public function removeAmulet(Amulet $amulet): static
    {
        if ($this->amulets->removeElement($amulet)) {
            // set the owning side to null (unless already changed)
            if ($amulet->getStatistic() === $this) {
                $amulet->setStatistic(null);
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
            $chest->setStatistic($this);
        }

        return $this;
    }

    public function removeChest(Chest $chest): static
    {
        if ($this->chests->removeElement($chest)) {
            // set the owning side to null (unless already changed)
            if ($chest->getStatistic() === $this) {
                $chest->setStatistic(null);
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
            $belt->setStatistic($this);
        }

        return $this;
    }

    public function removeBelt(Belt $belt): static
    {
        if ($this->belts->removeElement($belt)) {
            // set the owning side to null (unless already changed)
            if ($belt->getStatistic() === $this) {
                $belt->setStatistic(null);
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
            $glove->setStatistic($this);
        }

        return $this;
    }

    public function removeGlove(Glove $glove): static
    {
        if ($this->gloves->removeElement($glove)) {
            // set the owning side to null (unless already changed)
            if ($glove->getStatistic() === $this) {
                $glove->setStatistic(null);
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
            $trousers->setStatistic($this);
        }

        return $this;
    }

    public function removeTrousers(Trouser $trousers): static
    {
        if ($this->trousers->removeElement($trousers)) {
            // set the owning side to null (unless already changed)
            if ($trousers->getStatistic() === $this) {
                $trousers->setStatistic(null);
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
            $boot->setStatistic($this);
        }

        return $this;
    }

    public function removeBoot(Boot $boot): static
    {
        if ($this->boots->removeElement($boot)) {
            // set the owning side to null (unless already changed)
            if ($boot->getStatistic() === $this) {
                $boot->setStatistic(null);
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
            $weapon->setStatistic($this);
        }

        return $this;
    }

    public function removeWeapon(Weapon $weapon): static
    {
        if ($this->weapons->removeElement($weapon)) {
            // set the owning side to null (unless already changed)
            if ($weapon->getStatistic() === $this) {
                $weapon->setStatistic(null);
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
            $shield->setStatistic($this);
        }

        return $this;
    }

    public function removeShield(Shield $shield): static
    {
        if ($this->shields->removeElement($shield)) {
            // set the owning side to null (unless already changed)
            if ($shield->getStatistic() === $this) {
                $shield->setStatistic(null);
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
            $ring->setStatistic($this);
        }

        return $this;
    }

    public function removeRing(Ring $ring): static
    {
        if ($this->rings->removeElement($ring)) {
            // set the owning side to null (unless already changed)
            if ($ring->getStatistic() === $this) {
                $ring->setStatistic(null);
            }
        }

        return $this;
    }
}
