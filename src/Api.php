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
    private HttpClientInterface $client;


    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getCharacter(int $id): ?Character {
        $response = $this->client->request(Config::GET_METHOD, Config::getClientRootUrl() . Config::CHARACTER_HANDLE . $id);
        $content = $response->getContent();
        $assocArray = $this->getAssocArrayFromJson($content);
        $character = new Character($id);
        return $this->mapAssocArrayToCharacter($assocArray, $character);
    }

    public function getCharacters(CharacterFilter $filter = null): ?array {
        $assocArray = $this->getAssocArray($filter, Config::CHARACTER_HANDLE);
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
        $response = $this->client->request(Config::GET_METHOD, Config::getClientRootUrl() . Config::LOCATION_HANDLE . $id);
        $content = $response->getContent();
        $object = $this->getAssocArrayFromJson($content);
        $character = new Location();

        return $this->mapAssocArrayToLocation($object, $character);
    }

    public function getLocations(LocationFilter $filter = null): ?array {
        $assocArray = $this->getAssocArray($filter, Config::LOCATION_HANDLE);
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
        $response = $this->client->request(Config::GET_METHOD, Config::getClientRootUrl() . Config::EPISODE_HANDLE . $id);
        $content = $response->getContent();
        $assocArray = $this->getAssocArrayFromJson($content);
        $episode = new Episode();

        return $this->mapAssocArrayToEpisode($assocArray, $episode);
    }

    public function getEpisodes(EpisodeFilter $filter): ?array {
        $assocArray = $this->getAssocArray($filter, Config::EPISODE_HANDLE);
        $episodes = [];
        foreach ($assocArray['results'] as $location) {
            $episodeModel = new Episode();
            $episodeModel = $this->mapAssocArrayToEpisode($location, $episodeModel);
            $episodes[] = $episodeModel;
        }

        return $episodes;
    }

    private function mapAssocArrayToEpisode(array $assocArray, Episode $location): Episode
    {
        $location->setId($assocArray['id'] ?? null);
        $location->setName($assocArray['name'] ?? null);
        $location->setAirDate($assocArray['air_date'] ?? null);
        $location->setEpisode($assocArray['episode'] ?? null);
        $location->setCharacters($assocArray['characters'] ?? null);
        $location->setUrl($assocArray['url'] ?? null);
        $location->setCreated($assocArray['created'] ?? null);

        return $location;
    }

    private function getAssocArrayFromJson(string $content)
    {
        $object = json_decode($content, true);
        if (json_last_error() != "No error") {
            throw new Exception("Error occurred while decoding json string");
        }

        return $object;
    }

    private function getAssocArray(?FilterInterface $filter, $handle)
    {
        if ($filter != null)
            $response = $this->client->request(Config::GET_METHOD, Config::getClientRootUrl() . $handle . $filter->getQueryParamsString());
        else
            $response = $this->client->request(Config::GET_METHOD, Config::getClientRootUrl() . $handle);
        $content = $response->getContent();
        return $this->getAssocArrayFromJson($content);
    }
}
