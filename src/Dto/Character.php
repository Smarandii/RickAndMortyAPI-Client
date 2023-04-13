<?php
declare(strict_types=1);
namespace RickAndMortyAPI\Dto;

class Character implements \JsonSerializable
{
    private ?int $id;

    private ?string $name;

    private ?string $status;

    private ?string $species;

    private ?string $type;

    private ?string $gender;

    private ?Location $origin;

    private ?Location $location;

    private ?string $image;

    private ?array $episode;

    private ?string $url;
    
    private ?string $created;

    public function __construct($id=null)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {

        return $this->id ?? null;
    }

    /**
     * @param int|null $id
     * @return Character|null
     */
    public function setId(?int $id): ?Character
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {

        return $this->name ?? null;
    }

    /**
     * @param string|null $name
     * @return Character|null
     */
    public function setName(?string $name): ?Character
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): ?string
    {

        return $this->status ?? null;
    }

    /**
     * @param string|null $status
     * @return Character|null
     */
    public function setStatus(?string $status): ?Character
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string
     */
    public function getSpecies(): ?string
    {

        return $this->species ?? null;
    }

    /**
     * @param string|null $species
     * @return Character|null
     */
    public function setSpecies(?string $species): ?Character
    {
        $this->species = $species;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): ?string
    {

        return $this->type ?? null;
    }

    /**
     * @param string|null $type
     * @return Character|null
     */
    public function setType(?string $type): ?Character
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return bool
     */
    public function getGender(): ?string
    {

        return $this->gender ?? null;
    }

    /**
     * @param bool $gender
     */
    public function setGender(?string $gender): ?Character
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * @return \RickAndMortyAPI\Dto\Location
     */
    public function getOrigin(): ?Location
    {

        return $this->origin ?? null;
    }

    /**
     * @param Location|null $origin
     * @return Character|null
     */
    public function setOrigin(?Location $origin): ?Character
    {
        $this->origin = $origin;

        return $this;
    }

    /**
     * @return \RickAndMortyAPI\Dto\Location
     */
    public function getLocation(): ?Location
    {

        return $this->location ?? null;
    }

    /**
     * @param Location|null $location
     * @return Character|null
     */
    public function setLocation(?Location $location): ?Character
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return string
     */
    public function getImage(): ?string
    {

        return $this->image ?? null;
    }

    /**
     * @param string|null $image
     * @return Character|null
     */
    public function setImage(?string $image): ?Character
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return array
     */
    public function getEpisode(): ?array
    {

        return $this->episode ?? null;
    }

    /**
     * @param array|null $episode
     * @return Character|null
     */
    public function setEpisode(?array $episode): ?Character
    {

        $this->episode = $episode;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): ?string
    {

        return $this->url ?? null;
    }

    /**
     * @param string|null $url
     * @return Character|null
     */
    public function setUrl(?string $url): ?Character
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getCreated(): ?string
    {

        return $this->created ?? null;
    }

    /**
     * @param string $created
     */
    public function setCreated(?string $created): ?Character
    {
        $this->created = $created;

        return $this;
    }


    public function jsonSerialize()
    {
        return array_filter([
            'id' => $this->id,
            'name' => $this->name,
            'status' => $this->status,
            'species' => $this->species,
            'type' => $this->type,
            'gender' => $this->gender,
            'origin' => $this->origin,
            'location' => $this->location,
            'image' => $this->image,
            'episode' => $this->episode,
            'url' => $this->url,
            'created' => $this->created
        ], function ($value) {
            return $value !== null;
        });
    }

}
