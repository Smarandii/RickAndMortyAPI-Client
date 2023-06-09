<?php

declare(strict_types=1);

namespace RickAndMortyAPI\Dto;

class EpisodeFilter implements FilterInterface {

    private ?array $ids;

    /**
     * @return array|null
     */
    public function getIds(): ?array
    {
        return $this->ids;
    }

    /**
     * @param array|null $ids
     * @return EpisodeFilter
     */
    public function setIds(?array $ids): EpisodeFilter
    {
        $this->ids = $ids;
        return $this;
    }
    private ?string $name;
    private ?string $episode;

    public function __construct(array $filter_params = [])
    {
        $this->ids = $filter_params['ids'] ?? null;
        $this->name = $filter_params['name'] ?? null;
        $this->episode = $filter_params['episode'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return EpisodeFilter
     */
    public function setName(?string $name): EpisodeFilter
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEpisode(): ?string
    {
        return $this->episode;
    }

    /**
     * @param string|null $episode
     * @return EpisodeFilter
     */
    public function setEpisode(?string $episode): EpisodeFilter
    {
        $this->episode = $episode;
        return $this;
    }


    public function getQueryParamsString(): string
    {
        if (isset($this->ids) && $this->ids != null)
            return implode(',', $this->ids);
        return '?' . (isset($this->name) ? 'name=' . $this->name : '')
            . (isset($this->episode) ? '&episode=' . $this->episode : '');
    }
}