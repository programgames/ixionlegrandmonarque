<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GameCustomizationObjectRepository")
 */
class GameCustomizationObject
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
    private $category;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CurrentGameParticipant", inversedBy="gameCustomizationObjects")
     * @ORM\JoinColumn(nullable=false)
     */
    private $currentGameParticipant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

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
