<?php
declare(strict_types=1);
namespace RickAndMortyAPI;

use RickAndMortyAPI\Dto\Character;
use RickAndMortyAPI\Dto\Episode;
use RickAndMortyAPI\Dto\EpisodeFilter;
use RickAndMortyAPI\Dto\FilterInterface;
use RickAndMortyAPI\Dto\Location;
use RickAndMortyAPI\Dto\CharacterFilter;
use RickAndMortyAPI\Dto\LocationFilter;

use Exception;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Api
{
    const GET_METHOD = "GET";
    const CHARACTER_HANDLE = '/api/character/';
    const LOCATION_HANDLE = '/api/location/';
    const EPISODE_HANDLE = '/api/episode/';

    private HttpClientInterface $client;


    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getCharacter(int $id): ?Character {
        $response = $this->client->request(Api::GET_METHOD, Api::CHARACTER_HANDLE . $id);
        $content = $response->getContent();
        $assocArray = $this->getAssocArrayFromJson($content);
        $character = new Character($id);
        return $this->mapAssocArrayToCharacter($assocArray, $character);
    }

    public function getCharacters(CharacterFilter $filter = null): ?array {
        $assocArray = $this->getAssocArray($filter, Api::CHARACTER_HANDLE);
        $characters = [];
        foreach ($assocArray['results'] as $character) {
            $characterModel = new Character($character->id);
            $characterModel = $this->mapAssocArrayToCharacter($character, $characterModel);
            $characters[] = $characterModel;
        }

        return $characters;
    }

    private function mapAssocArrayToCharacter(array $assocArray, Character $character): Character
    {
        $character->setId($assocArray['id'] ?? null);
        $character->setName($assocArray['name'] ?? null);
        $character->setStatus($assocArray['status'] ?? null);
        $character->setSpecies($assocArray['species'] ?? null);
        $character->setType($assocArray['type'] ?? null);
        $character->setGender($assocArray['gender'] ?? null);

        $origin = new Location();
        $origin = $this->mapAssocArrayToLocation($assocArray['origin'] ?? [], $origin);
        $character->setOrigin($origin);

        $location = new Location();
        $location = $this->mapAssocArrayToLocation($assocArray['location'] ?? [], $location);
        $character->setLocation($location);

        $character->setImage($assocArray['image'] ?? null);
        $character->setEpisode($assocArray['episode'] ?? null);
        $character->setUrl($assocArray['url'] ?? null);
        $character->setCreated($assocArray['created'] ?? null);

        return $character;
    }

    public function getLocation(int $id): ?Location {
        $response = $this->client->request(Api::GET_METHOD, Api::LOCATION_HANDLE . $id);
        $content = $response->getContent();
        $object = $this->getAssocArrayFromJson($content);
        $character = new Location();

        return $this->mapAssocArrayToLocation($object, $character);
    }

    public function getLocations(LocationFilter $filter = null): ?array {
        $assocArray = $this->getAssocArray($filter, Api::LOCATION_HANDLE);
        $locations = [];
        foreach ($assocArray['results'] as $location) {
            $locationModel = new Location();
            $locationModel = $this->mapAssocArrayToLocation($location, $locationModel);
            $locations[] = $locationModel;
        }

        return $locations;
    }

    private function mapAssocArrayToLocation(array $assocArray, Location $location): Location
    {
        $location->setId($assocArray['id'] ?? null);
        $location->setName($assocArray['name'] ?? null);
        $location->setType($assocArray['type'] ?? null);
        $location->setDimension($assocArray['dimension'] ?? null);
        $location->setResidents($assocArray['residents'] ?? null);
        $location->setUrl($assocArray['url'] ?? null);
        $location->setCreated($assocArray['created'] ?? null);

        return $location;
    }

    public function getEpisode(int $id): ?Episode {
        $response = $this->client->request(Api::GET_METHOD, Api::EPISODE_HANDLE . $id);
        $content = $response->getContent();
        $assocArray = $this->getAssocArrayFromJson($content);
        $episode = new Episode();

        return $this->mapAssocArrayToEpisode($assocArray, $episode);
    }

    public function getEpisodes(EpisodeFilter $filter): ?array {
        $assocArray = $this->getAssocArray($filter, Api::EPISODE_HANDLE);
        $episodes = [];
        foreach ($assocArray['results'] as $location) {
            $episodeModel = new Episode();
            $episodeModel = $this->mapAssocArrayToEpisode($location, $episodeModel);
            $episodes[] = $episodeModel;
        }

        return $episodes;
    }

    private function mapAssocArrayToEpisode(array $assocArray, Episode $episode): Episode
    {
        $episode->setId($assocArray['id'] ?? null);
        $episode->setName($assocArray['name'] ?? null);
        $episode->setAirDate($assocArray['air_date'] ?? null);
        $episode->setEpisode($assocArray['episode'] ?? null);
        $episode->setCharacters($assocArray['characters'] ?? null);
        $episode->setUrl($assocArray['url'] ?? null);
        $episode->setCreated($assocArray['created'] ?? null);

        return $episode;
    }

    private function getAssocArrayFromJson(string $content)
    {
        $object = json_decode($content, true);
        if (json_last_error() != JSON_ERROR_NONE) {
            throw new Exception("Error occurred while decoding json string");
        }

        return $object;
    }

    private function getAssocArray(?FilterInterface $filter, $handle)
    {
        if ($filter != null)
            $response = $this->client->request(Api::GET_METHOD, $handle . $filter->getQueryParamsString());
        else
            $response = $this->client->request(Api::GET_METHOD, $handle);
        $content = $response->getContent();
        return $this->getAssocArrayFromJson($content);
    }
}
