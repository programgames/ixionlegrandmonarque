<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PerksRepository")
 */
class Perks
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
    private $perkStyle;

    /**
     * @ORM\Column(type="array")
     */
    private $perkIds = [];

    /**
     * @ORM\Column(type="integer")
     */
    private $perkSubStyle;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CurrentGameParticipant", inversedBy="perks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $currentGameParticipant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPerkStyle(): ?int
    {
        return $this->perkStyle;
    }

    public function setPerkStyle(int $perkStyle): self
    {
        $this->perkStyle = $perkStyle;

        return $this;
    }

    public function getPerkIds(): ?array
    {
        return $this->perkIds;
    }

    public function setPerkIds(array $perkIds): self
    {
        $this->perkIds = $perkIds;

        return $this;
    }

    public function getPerkSubStyle(): ?int
    {
        return $this->perkSubStyle;
    }

    public function setPerkSubStyle(int $perkSubStyle): self
    {
        $this->perkSubStyle = $perkSubStyle;

        return $this;
    }

    public function getCurrentGameParticipant(): ?CurrentGameParticipant
    {
        return $this->currentGameParticipant;
    }

    public function setCurrentGameParticipant(?CurrentGameParticipant $currentGameParticipant): self
    {
        $this->currentGameParticipant = $currentGameParticipant;

        return $this;
    }
}
