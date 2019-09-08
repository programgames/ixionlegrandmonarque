<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SummonerRepository")
 */
class Summoner
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
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $puuid;

    /**
     * @ORM\Column(type="integer")
     */
    private $summonerLevel;

    /**
     * @ORM\Column(type="integer")
     */
    private $revisionDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $summonerId;

    /**
     * @ORM\Column(type="integer")
     */
    private $accountId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $iconUrl;

    private $activateGameData;

    /**
     * Summoner constructor.
     *
     * @param RiotApiResponse $apiResponse
     */
    public function __construct(RiotApiResponse $apiResponse)
    {
        $this->accountId = $apiResponse->getData()['accountId'];
        $this->profileIconId = $apiResponse->getData()['profileIconId'];
        $this->name = $apiResponse->getData()['name'];
        $this->puuid = $apiResponse->getData()['puuid'];
        $this->revisionDate = $apiResponse->getData()['revisionDate'];
        $this->summonerId = $apiResponse->getData()['id'];
        $this->summonerLevel = $apiResponse->getData()['summonerLevel'];
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPuuid(): ?string
    {
        return $this->puuid;
    }

    public function setPuuid(string $puuid): self
    {
        $this->puuid = $puuid;

        return $this;
    }

    public function getSummonerLevel(): ?int
    {
        return $this->summonerLevel;
    }

    public function setSummonerLevel(int $summonerLevel): self
    {
        $this->summonerLevel = $summonerLevel;

        return $this;
    }

    public function getRevisionDate(): ?int
    {
        return $this->revisionDate;
    }

    public function setRevisionDate(int $revisionDate): self
    {
        $this->revisionDate = $revisionDate;

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

    public function getAccountId(): ?int
    {
        return $this->accountId;
    }

    public function setAccountId(int $accountId): self
    {
        $this->accountId = $accountId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIconUrl()
    {
        return $this->iconUrl;
    }

    /**
     * @param mixed $iconUrl
     */
    public function setIconUrl($iconUrl): void
    {
        $this->iconUrl = $iconUrl;
    }

    /**
     * @return mixed
     */
    public function getActivateGameData()
    {
        return $this->activateGameData;
    }

    /**
     * @param mixed $activateGameData
     */
    public function setActivateGameData($activateGameData): void
    {
        $this->activateGameData = $activateGameData;
    }
}
