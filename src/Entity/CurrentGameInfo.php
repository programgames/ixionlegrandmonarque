<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CurrentGameInfoRepository")
 */
class CurrentGameInfo
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
    private $gameId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gameStartTime;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $platformId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gameMode;

    /**
     * @ORM\Column(type="integer")
     */
    private $mapId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gameType;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BannedChampion", mappedBy="currentGameInfo", orphanRemoval=true)
     */
    private $bannedChampions;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Observer", inversedBy="currentGameInfo", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $observers;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CurrentGameParticipant", mappedBy="currentGameInfo", orphanRemoval=true)
     */
    private $participants;

    /**
     * @ORM\Column(type="integer")
     */
    private $gameLength;

    /**
     * @ORM\Column(type="integer")
     */
    private $gameQueueConfigId;

    public function __construct(RiotApiResponse $apiResponse)
    {
        $this->setGameLength($apiResponse->getData()['gameLength']);
        $this->bannedChampions = new ArrayCollection();
        $this->participants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGameId(): ?int
    {
        return $this->gameId;
    }

    public function setGameId(int $gameId): self
    {
        $this->gameId = $gameId;

        return $this;
    }

    public function getGameStartTime(): ?string
    {
        return $this->gameStartTime;
    }

    public function setGameStartTime(string $gameStartTime): self
    {
        $this->gameStartTime = $gameStartTime;

        return $this;
    }

    public function getPlatformId(): ?string
    {
        return $this->platformId;
    }

    public function setPlatformId(string $platformId): self
    {
        $this->platformId = $platformId;

        return $this;
    }

    public function getGameMode(): ?string
    {
        return $this->gameMode;
    }

    public function setGameMode(string $gameMode): self
    {
        $this->gameMode = $gameMode;

        return $this;
    }

    public function getMapId(): ?int
    {
        return $this->mapId;
    }

    public function setMapId(int $mapId): self
    {
        $this->mapId = $mapId;

        return $this;
    }

    public function getGameType(): ?string
    {
        return $this->gameType;
    }

    public function setGameType(string $gameType): self
    {
        $this->gameType = $gameType;

        return $this;
    }

    /**
     * @return Collection|BannedChampion[]
     */
    public function getBannedChampions(): Collection
    {
        return $this->bannedChampions;
    }

    public function addBannedChampion(BannedChampion $bannedChampion): self
    {
        if (!$this->bannedChampions->contains($bannedChampion)) {
            $this->bannedChampions[] = $bannedChampion;
            $bannedChampion->setCurrentGameInfo($this);
        }

        return $this;
    }

    public function removeBannedChampion(BannedChampion $bannedChampion): self
    {
        if ($this->bannedChampions->contains($bannedChampion)) {
            $this->bannedChampions->removeElement($bannedChampion);
            // set the owning side to null (unless already changed)
            if ($bannedChampion->getCurrentGameInfo() === $this) {
                $bannedChampion->setCurrentGameInfo(null);
            }
        }

        return $this;
    }

    public function getObservers(): ?Observer
    {
        return $this->observers;
    }

    public function setObservers(Observer $observers): self
    {
        $this->observers = $observers;

        return $this;
    }

    /**
     * @return Collection|CurrentGameParticipant[]
     */
    public function getParticipants(): Collection
    {
        return $this->participants;
    }

    public function addParticipant(CurrentGameParticipant $participant): self
    {
        if (!$this->participants->contains($participant)) {
            $this->participants[] = $participant;
            $participant->setCurrentGameInfo($this);
        }

        return $this;
    }

    public function removeParticipant(CurrentGameParticipant $participant): self
    {
        if ($this->participants->contains($participant)) {
            $this->participants->removeElement($participant);
            // set the owning side to null (unless already changed)
            if ($participant->getCurrentGameInfo() === $this) {
                $participant->setCurrentGameInfo(null);
            }
        }

        return $this;
    }

    public function getGameLength(): ?int
    {
        return $this->gameLength;
    }

    public function setGameLength(int $gameLength): self
    {
        $this->gameLength = $gameLength;

        return $this;
    }

    public function getGameQueueConfigId(): ?int
    {
        return $this->gameQueueConfigId;
    }

    public function setGameQueueConfigId(int $gameQueueConfigId): self
    {
        $this->gameQueueConfigId = $gameQueueConfigId;

        return $this;
    }
}
