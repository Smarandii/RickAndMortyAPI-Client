<?php

declare(strict_types=1);

namespace RickAndMortyAPI\Dto;

class LocationFilter implements FilterInterface
{
    private ?string $name;

    private ?string $type;

    private ?string $dimension;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return LocationFilter
     */
    public function setName(?string $name): LocationFilter
    {
        $this->name = $name;
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
     * @return LocationFilter
     */
    public function setType(?string $type): LocationFilter
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDimension(): ?string
    {
        return $this->dimension;
    }

    /**
     * @param string|null $dimension
     * @return LocationFilter
     */
    public function setDimension(?string $dimension): LocationFilter
    {
        $this->dimension = $dimension;
        return $this;
    }


    public function __construct(array $filter_params = [])
    {
        $this->name = $filter_params['name'] ?? null;
        $this->type = $filter_params['type'] ?? null;
        $this->dimension = $filter_params['dimension'] ?? null;
    }

    public function getQueryParamsString(): string
    {
        return '?' . (isset($this->name) ? 'name=' . $this->name : '')
            . (isset($this->type) ? '&type=' . $this->type : '')
            . (isset($this->dimension) ? '&dimension=' . $this->dimension : '');
    }

}