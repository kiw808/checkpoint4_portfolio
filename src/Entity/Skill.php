<?php

namespace App\Entity;

use App\Repository\SkillRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SkillRepository::class)
 */
class Skill
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $level;

    /**
     * @ORM\ManyToMany(targetEntity=Education::class, inversedBy="skills")
     */
    private $learnedAt;

    public function __construct()
    {
        $this->learnedAt = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(?int $level): self
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return Collection|Education[]
     */
    public function getLearnedAt(): Collection
    {
        return $this->learnedAt;
    }

    public function addLearnedAt(Education $learnedAt): self
    {
        if (!$this->learnedAt->contains($learnedAt)) {
            $this->learnedAt[] = $learnedAt;
        }

        return $this;
    }

    public function removeLearnedAt(Education $learnedAt): self
    {
        if ($this->learnedAt->contains($learnedAt)) {
            $this->learnedAt->removeElement($learnedAt);
        }

        return $this;
    }
}
