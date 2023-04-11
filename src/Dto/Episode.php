<?php
declare(strict_types=1);
namespace RickAndMortyAPI\Dto;

use JsonSerializable;

class Episode implements JsonSerializable
{
    private ?int $id;

    private ?string $name;

    private ?string $air_date;

    private ?string $episode;

    private ?array $characters;

    private ?string $url;

    private ?string $created;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Episode|null
     */
    public function setId(?int $id): ?Episode
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return Episode|null
     */
    public function setName(?string $name): ?Episode
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getAirDate(): string
    {
        return $this->air_date;
    }

    /**
     * @param string|null $air_date
     * @return Episode|null
     */
    public function setAirDate(?string $air_date): ?Episode
    {
        $this->air_date = $air_date;
        return $this;
    }

    /**
     * @return string
     */
    public function getEpisode(): string
    {
        return $this->episode;
    }

    /**
     * @param string|null $episode
     * @return Episode|null
     */
    public function setEpisode(?string $episode): ?Episode
    {
        $this->episode = $episode;
        return $this;
    }

    /**
     * @return array
     */
    public function getCharacters(): array
    {
        return $this->characters;
    }

    /**
     * @param array|null $characters
     * @return Episode|null
     */
    public function setCharacters(?array $characters): ?Episode
    {
        $this->characters = $characters;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     * @return Episode|null
     */
    public function setUrl(?string $url): ?Episode
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreated(): string
    {
        return $this->created;
    }

    /**
     * @param string|null $created
     * @return Episode|null
     */
    public function setCreated(?string $created): ?Episode
    {
        $this->created = $created;
        return $this;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

}