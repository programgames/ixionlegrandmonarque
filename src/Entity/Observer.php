<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ObserverRepository")
 */
class Observer
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
    private $encryptionKey;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\CurrentGameInfo", mappedBy="observers", cascade={"persist", "remove"})
     */
    private $currentGameInfo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEncryptionKey(): ?string
    {
        return $this->encryptionKey;
    }

    public function setEncryptionKey(string $encryptionKey): self
    {
        $this->encryptionKey = $encryptionKey;

        return $this;
    }

    public function getCurrentGameInfo(): ?CurrentGameInfo
    {
        return $this->currentGameInfo;
    }

    public function setCurrentGameInfo(CurrentGameInfo $currentGameInfo): self
    {
        $this->currentGameInfo = $currentGameInfo;

        // set the owning side of the relation if necessary
        if ($this !== $currentGameInfo->getObservers()) {
            $currentGameInfo->setObservers($this);
        }

        return $this;
    }
}
