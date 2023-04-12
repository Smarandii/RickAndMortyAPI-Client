<?php
declare(strict_types=1);
namespace RickAndMortyAPI\Dto;

class Location implements \JsonSerializable
{
    private ?int $id;

    private ?string $name;

    private ?string $type;

    private ?string $dimension;

    private ?array $residents;

    private ?string $url;

    private ?string $created;

    /**
     * @return int
     */
    public function getId(): ?int
    {

        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Location|null
     */
    public function setId(?int $id): ?Location
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {

        return $this->name;
    }

    /**
     * @param string|null $name
     * @return Location|null
     */
    public function setName(?string $name): ?Location
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): ?string
    {

        return $this->type;
    }

    /**
     * @param string|null $type
     * @return Location|null
     */
    public function setType(?string $type): ?Location
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getDimension(): ?string
    {

        return $this->dimension;
    }

    /**
     * @param string|null $dimension
     * @return Location|null
     */
    public function setDimension(?string $dimension): ?Location
    {
        $this->dimension = $dimension;

        return $this;
    }

    /**
     * @return array
     */
    public function getResidents(): ?array
    {

        return $this->residents;
    }

    /**
     * @param array|null $residents
     * @return Location|null
     */
    public function setResidents(?array $residents): ?Location
    {
        $this->residents = $residents;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): ?string
    {

        return $this->url;
    }

    /**
     * @param string|null $url
     * @return Location|null
     */
    public function setUrl(?string $url): ?Location
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getCreated(): ?string
    {

        return $this->created;
    }

    /**
     * @param string|null $created
     * @return Location|null
     */
    public function setCreated(?string $created): ?Location
    {

        $this->created = $created;
        return $this;
    }

    public function jsonSerialize(): ?array
    {

        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'type' => $this->getType(),
            'dimension' => $this->getDimension(),
            'residents' => $this->getResidents(),
            'url' => $this->getUrl(),
            'created' => $this->getCreated(),
        ];
    }


}