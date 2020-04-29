<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PropertySearchRepository")
 */
class PropertySearch
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var ArrayCollection
     */
    private $options;

    public function __construct()) {
        $this->options = new ArrayCollection();
    }

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $maxPrice;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Range(
     *      min = 10,
     *      max = 400,
     *      minMessage = "La surface du bien doit être supèrieur au 10 m² .",
     *      maxMessage = "La surface du bien doit être infèrieur au 400 m² .")
     */
    private $minSurface;
 
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMaxPrice(): ?int
    {
        return $this->maxPrice;
    }

    public function setMaxPrice(?int $maxPrice): self
    {
        $this->maxPrice = $maxPrice;

        return $this;
    }

    public function getMinSurface(): ?int
    {
        return $this->minSurface;
    }

    public function setMinSurface(?int $minSurface): self
    {
        $this->minSurface = $minSurface;

        return $this;
    }

    /**
    * @return Array Collection
    */
    public function getOptions(): ArrayCollection
    {
        return $this->options;

    }

    /**
    * @param Array Collection $options
    */
    public function setOptions(ArrayCollection $options): void
    {
        $this->options = $options;

    }
}
