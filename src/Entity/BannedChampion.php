<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BannedChampionRepository")
 */
class BannedChampion
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
    private $pickTurn;

    /**
     * @ORM\Column(type="integer")
     */
    private $championId;

    /**
     * @ORM\Column(type="integer")
     */
    private $teamId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CurrentGameInfo", inversedBy="bannedChampions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $currentGameInfo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPickTurn(): ?int
    {
        return $this->pickTurn;
    }

    public function setPickTurn(int $pickTurn): self
    {
        $this->pickTurn = $pickTurn;

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

    public function getTeamId(): ?int
    {
        return $this->teamId;
    }

    public function setTeamId(int $teamId): self
    {
        $this->teamId = $teamId;

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
