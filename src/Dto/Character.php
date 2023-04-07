<?php

namespace RickAndMortyAPI\Dto;
use RickAndMortyAPI\Dto\Location;

class Character implements \JsonSerializable
{
    private int $id;

    private string $name;

    private string $status;

    private string $species;

    private string $type;

    private bool $gender;

    private Location $origin;

    private Location $location;

    private string $image;

    private array $episode;

    private string $url;
    
    private string $created;

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getSpecies(): string
    {
        return $this->species;
    }

    /**
     * @param string $species
     */
    public function setSpecies(string $species): void
    {
        $this->species = $species;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return bool
     */
    public function getGender(): bool
    {
        return $this->gender;
    }

    /**
     * @param bool $gender
     */
    public function setGender(bool $gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @return \RickAndMortyAPI\Dto\Location
     */
    public function getOrigin(): Location
    {
        return $this->origin;
    }

    /**
     * @param \RickAndMortyAPI\Dto\Location $origin
     */
    public function setOrigin(Location $origin): void
    {
        $this->origin = $origin;
    }

    /**
     * @return \RickAndMortyAPI\Dto\Location
     */
    public function getLocation(): Location
    {
        return $this->location;
    }

    /**
     * @param \RickAndMortyAPI\Dto\Location $location
     */
    public function setLocation(Location $location): void
    {
        $this->location = $location;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    /**
     * @return array
     */
    public function getEpisode(): array
    {
        return $this->episode;
    }

    /**
     * @param array $episode
     */
    public function setEpisode(array $episode): void
    {
        $this->episode = $episode;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getCreated(): string
    {
        return $this->created;
    }

    /**
     * @param string $created
     */
    public function setCreated(string $created): void
    {
        $this->created = $created;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

}
