<?php
declare(strict_types=1);
namespace RickAndMortyAPI;

use Exception;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;
use RickAndMortyAPI\Dto\Character;
use RickAndMortyAPI\Dto\Location;
use stdClass;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Api
{
    private HttpClientInterface $client;


    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getCharacter(int $id): ?Character {
        try {
            $response = $this->client->request(Config::GET_METHOD, Config::getClientRootUrl() . Config::CHARACTER_HANDLE . $id);
            $content = $response->getContent();
            $object = $this->getObjectFromJson($content);
            $character = new Character($id);

            return $this->mapArrayToCharacter($object, $character);
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), $e->getCode(), $e->getPrevious());
        }
    }

    public function getCharacters(): ?array {
            $response = $this->client->request(Config::GET_METHOD, Config::getClientRootUrl() . Config::CHARACTER_HANDLE);
            $content = $response->getContent();
            $object = $this->getObjectFromJson($content);
            $characters = [];
            foreach ($object->results as $character) {
                $characterModel = new Character($character->id);
                $characterModel = $this->mapArrayToCharacter($character, $characterModel);
                $characters[] = $characterModel;
            }

            return $characters;
    }

    private function mapArrayToCharacter(object $object, Character $character): Character
    {
        $character->setId($object->id ?? null);
        $character->setName($object->name ?? null);
        $character->setStatus(($object->status ?? null));
        $character->setSpecies(($object->species ?? null));
        $character->setType($object->type ?? null);
        $character->setGender($object->gender ?? null);
        $location = new Location();
        $character->setOrigin($this->mapArrayToLocation($object->origin, $location) ?? null);
        $character->setLocation($this->mapArrayToLocation($object->location, $location) ?? null);
        $character->setImage($object->image ?? null);
        $character->setEpisode($object->episode ?? null);
        $character->setUrl($object->url ?? null);
        $character->setCreated($object->url ?? null);

        return $character;
    }

    public function getLocation(int $id): ?Location {
            $response = $this->client->request(Config::GET_METHOD, Config::getClientRootUrl() . Config::LOCATION_HANDLE . $id);
            $content = $response->getContent();
            $object = $this->getObjectFromJson($content);
            $character = new Location();

            return $this->mapArrayToLocation($object, $character);
    }

    public function getLocations(): ?array {
            $response = $this->client->request(Config::GET_METHOD, Config::getClientRootUrl() . Config::LOCATION_HANDLE);
            $content = $response->getContent();
            $object = $this->getObjectFromJson($content);
            $locations = [];
            foreach ($object->results as $location) {
                $locationModel = new Location();
                $locationModel = $this->mapArrayToLocation($location, $locationModel);
                $locations[] = $locationModel;
            }

            return $locations;
    }

    private function mapArrayToLocation(stdClass $object, Location $location): Location
    {
        $location->setId($object->id ?? null);
        $location->setName($object->name ?? null);
        $location->setType($object->type ?? null);
        $location->setDimension($object->dimension ?? null);
        $location->setResidents($object->residents ?? null);
        $location->setUrl($object->url ?? null);
        $location->setCreated($object->created ?? null);

        return $location;
    }

    private function getObjectFromJson(string $content)
    {
        $object = json_decode($content);
        if (json_last_error() != "No error") {
            throw new Exception("Error occurred while decoding json string");
        }

        return $object;
    }
}
