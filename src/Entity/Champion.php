<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SummonerRepository")
 */
class Champion
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $splashart;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * Summoner constructor.
     *
     * @param RiotApiResponse $apiResponse
     */
    public function __construct(RiotApiResponse $apiResponse)
    {
        $jsonChampion = array_shift($apiResponse->getData()['data']);
        $jsonChampionImage = $jsonChampion['image'];
        $this->name = $jsonChampion['name'];
        $this->title = $jsonChampion['title'];
        $this->splashart = $jsonChampion['image']['full'];
        $this->image = $jsonChampion['image']['sprite'];
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getSplashart()
    {
        return $this->splashart;
    }

    /**
     * @param mixed $splashart
     */
    public function setSplashart($splashart): void
    {
        $this->splashart = $splashart;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }
}
