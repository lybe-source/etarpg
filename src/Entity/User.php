<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTrait;
use App\Entity\Traits\UpdatedAtTrait;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`', options: ["collate" => "utf8mb4_general_ci"])]
class User implements UserInterface
{
    use CreatedAtTrait;
    use UpdatedAtTrait;
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private ?string $username;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private ?string $email;

    #[ORM\Column(type: 'json')]
    private array $roles = [];

    #[ORM\Column(type: 'string', length: 32)]
    private ?string $discordId;

    #[ORM\Column(type: 'string', length: 32, nullable: true)]
    private ?string $avatar = null;

    #[ORM\Column(length: 255)]
    private ?string $accessToken = null;
    
    #[ORM\Column(type: 'boolean', options: ['default' => false])]
    private ?bool $is_banned = false;

    #[ORM\OneToOne(mappedBy: 'user', cascade: ['persist', 'remove'])]
    private ?Inventory $inventory = null;

    public function __construct()
    {
        $this->is_banned = false;
        $this->created_at = new \DateTimeImmutable();
        $this->updated_at = new \DateTimeImmutable();

        $this->inventory = new Inventory();
        $this->inventory->setUser($this);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     * 
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return "{$this->email}-{$this->username}";
    }
    
    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;

        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getDiscordId(): ?string
    {
        return $this->discordId;
    }

    public function setDiscordId(string $discordId): self
    {
        $this->discordId = $discordId;

        return $this;
    }
    
    public function getAvatar(): ?string
    {
        return "https://cdn.discordapp.com/avatars/{$this->discordId}/{$this->avatar}.webp";
    }

    public function setAvatar(?string $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }
    
    public function getAccessToken(): ?string
    {
        return $this->accessToken;
    }

    public function setAccessToken(string $accessToken): self
    {
        $this->accessToken = $accessToken;

        return $this;
    }
    
    public function isIsBanned(): ?bool
    {
        return $this->is_banned;
    }

    public function setIsBanned(bool $is_banned): static
    {
        $this->is_banned = $is_banned;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        
    }

    public function getInventory(): ?Inventory
    {
        return $this->inventory;
    }

    public function setInventory(Inventory $inventory): static
    {
        // set the owning side of the relation if necessary
        if ($inventory->getUser() !== $this) {
            $inventory->setUser($this);
        }

        $this->inventory = $inventory;

        return $this;
    }
}
