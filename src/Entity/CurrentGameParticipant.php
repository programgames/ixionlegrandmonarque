<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CurrentGameParticipantRepository")
 */
class CurrentGameParticipant
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $profileIconId;

    /**
     * @ORM\Column(type="integer")
     */
    private $championId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $summonerName;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\GameCustomizationObject", mappedBy="currentGameParticipant", orphanRemoval=true)
     */
    private $gameCustomizationObjects;

    /**
     * @ORM\Column(type="boolean")
     */
    private $bot;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Perks", mappedBy="currentGameParticipant", orphanRemoval=true)
     */
    private $perks;

    /**
     * @ORM\Column(type="integer")
     */
    private $spell2Id;

    /**
     * @ORM\Column(type="integer")
     */
    private $teamId;

    /**
     * @ORM\Column(type="integer")
     */
    private $spell1Id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $summonerId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CurrentGameInfo", inversedBy="participants")
     * @ORM\JoinColumn(nullable=false)
     */
    private $currentGameInfo;

    public function __construct()
    {
        $this->gameCustomizationObjects = new ArrayCollection();
        $this->perks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProfileIconId(): ?int
    {
        return $this->profileIconId;
    }

    public function setProfileIconId(int $profileIconId): self
    {
        $this->profileIconId = $profileIconId;

        return $this;
    }

    public function getChampionId(): ?int
    {
        return $this->championId;
    }

    public function setChampionId(int $championId): self
    {
        $this->championId = $championId;

        return $this;
    }

    public function getSummonerName(): ?string
    {
        return $this->summonerName;
    }

    public function setSummonerName(string $summonerName): self
    {
        $this->summonerName = $summonerName;

        return $this;
    }

    /**
     * @return Collection|GameCustomizationObject[]
     */
    public function getGameCustomizationObjects(): Collection
    {
        return $this->gameCustomizationObjects;
    }

    public function addGameCustomizationObject(GameCustomizationObject $gameCustomizationObject): self
    {
        if (!$this->gameCustomizationObjects->contains($gameCustomizationObject)) {
            $this->gameCustomizationObjects[] = $gameCustomizationObject;
            $gameCustomizationObject->setCurrentGameParticipant($this);
        }

        return $this;
    }

    public function removeGameCustomizationObject(GameCustomizationObject $gameCustomizationObject): self
    {
        if ($this->gameCustomizationObjects->contains($gameCustomizationObject)) {
            $this->gameCustomizationObjects->removeElement($gameCustomizationObject);
            // set the owning side to null (unless already changed)
            if ($gameCustomizationObject->getCurrentGameParticipant() === $this) {
                $gameCustomizationObject->setCurrentGameParticipant(null);
            }
        }

        return $this;
    }

    public function getBot(): ?bool
    {
        return $this->bot;
    }

    public function setBot(bool $bot): self
    {
        $this->bot = $bot;

        return $this;
    }

    /**
     * @return Collection|Perks[]
     */
    public function getPerks(): Collection
    {
        return $this->perks;
    }

    public function addPerk(Perks $perk): self
    {
        if (!$this->perks->contains($perk)) {
            $this->perks[] = $perk;
            $perk->setCurrentGameParticipant($this);
        }

        return $this;
    }

    public function removePerk(Perks $perk): self
    {
        if ($this->perks->contains($perk)) {
            $this->perks->removeElement($perk);
            // set the owning side to null (unless already changed)
            if ($perk->getCurrentGameParticipant() === $this) {
                $perk->setCurrentGameParticipant(null);
            }
        }

        return $this;
    }

    public function getSpell2Id(): ?int
    {
        return $this->spell2Id;
    }

    public function setSpell2Id(int $spell2Id): self
    {
        $this->spell2Id = $spell2Id;

        return $this;
    }

    public function getTeamId(): ?int
    {
        return $this->teamId;
    }

    public function setTeamId(int $teamId): self
    {
        $this->teamId = $teamId;

        return $this;
    }

    public function getSpell1Id(): ?int
    {
        return $this->spell1Id;
    }

    public function setSpell1Id(int $spell1Id): self
    {
        $this->spell1Id = $spell1Id;

        return $this;
    }

    public function getSummonerId(): ?string
    {
        return $this->summonerId;
    }

    public function setSummonerId(string $summonerId): self
    {
        $this->summonerId = $summonerId;

        return $this;
    }

    public function getCurrentGameInfo(): ?CurrentGameInfo
    {
        return $this->currentGameInfo;
    }

    public function setCurrentGameInfo(?CurrentGameInfo $currentGameInfo): self
    {
        $this->currentGameInfo = $currentGameInfo;

        return $this;
    }
}
