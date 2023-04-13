<?php

declare(strict_types=1);

namespace RickAndMortyAPI\Dto;

class CharacterFilter implements FilterInterface
{
    private ?string $name;

    private ?string $status;

    private ?string $species;

    private ?string $type;

    private ?string $gender;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return CharacterFilter
     */
    public function setName(?string $name): CharacterFilter
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     * @return CharacterFilter
     */
    public function setStatus(?string $status): CharacterFilter
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSpecies(): ?string
    {
        return $this->species;
    }

    /**
     * @param string|null $species
     * @return CharacterFilter
     */
    public function setSpecies(?string $species): CharacterFilter
    {
        $this->species = $species;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     * @return CharacterFilter
     */
    public function setType(?string $type): CharacterFilter
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getGender(): ?string
    {
        return $this->gender;
    }

    /**
     * @param string|null $gender
     * @return CharacterFilter
     */
    public function setGender(?string $gender): CharacterFilter
    {
        $this->gender = $gender;
        return $this;
    }


    public function __construct(array $filter_params = [])
    {
        $this->name = $filter_params['name'] ?? null;
        $this->status = $filter_params['status'] ?? null;
        $this->species = $filter_params['species'] ?? null;
        $this->type = $filter_params['type'] ?? null;
        $this->gender = $filter_params['gender'] ?? null;
    }

    public function getQueryParamsString(): string
    {
        return '?' . (isset($this->name) ? 'name=' . $this->name : '')
            . (isset($this->status) ? '&status=' . $this->status : '')
            . (isset($this->species) ? '&species=' . $this->species : '')
            . (isset($this->type) ? '&type=' . $this->type : '')
            . (isset($this->gender) ? '&gender=' . $this->gender : '');
    }

}