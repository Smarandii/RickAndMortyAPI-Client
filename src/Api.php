<?php
declare(strict_types=1);
namespace RickAndMortyAPI;

use Exception;
use RickAndMortyAPI\Dto\Character;
use RickAndMortyAPI\Dto\Location;
use stdClass;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
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
            $response = $this->client->request(Config::$GET_METHOD, Config::$CLIENT_ROOT_URL . Config::$CHARACTER_HANDLE . $id);
            $content = $response->getContent();
            $object = json_decode($content);
            $character = new Character($id);
            return $this->mapArrayToCharacter($object, $character);
        } catch (
            Exception|
            TransportExceptionInterface|
            RedirectionExceptionInterface|
            ServerExceptionInterface|
            ClientExceptionInterface $e) {
            error_log($e->getMessage());
        }
        return null;
    }

    public function getCharacters(): ?array {
        try {
            $response = $this->client->request(Config::$GET_METHOD, Config::$CLIENT_ROOT_URL . Config::$CHARACTER_HANDLE);
            $content = $response->getContent();
            $object = json_decode($content);
            $characters = [];
            foreach ($object->results as $character) {
                $character_model = new Character($character->id);
                $character_model = $this->mapArrayToCharacter($character, $character_model);
                $characters[] = $character_model;
            }
            return $characters;
        } catch (
        Exception|
        TransportExceptionInterface|
        RedirectionExceptionInterface|
        ServerExceptionInterface|
        ClientExceptionInterface $e) {
            error_log($e->getMessage());
        }
        return null;
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
        try {
            $response = $this->client->request(Config::$GET_METHOD, Config::$CLIENT_ROOT_URL . Config::$LOCATION_HANDLE . $id);
            $content = $response->getContent();
            $object = json_decode($content);
            $character = new Location();
            return $this->mapArrayToLocation($object, $character);
        } catch (
            Exception|
            TransportExceptionInterface|
            RedirectionExceptionInterface|
            ServerExceptionInterface|
            ClientExceptionInterface $e) {
            error_log($e->getMessage());
        }
        return null;
    }

    public function getLocations(): ?array {
        try {
            $response = $this->client->request(Config::$GET_METHOD, Config::$CLIENT_ROOT_URL . Config::$LOCATION_HANDLE);
            $content = $response->getContent();
            $object = json_decode($content);
            $locations = [];
            foreach ($object->results as $location) {
                $location_model = new Location();
                $location_model = $this->mapArrayToLocation($location, $location_model);
                $locations[] = $location_model;
            }
            return $locations;
        } catch (
            Exception|
            TransportExceptionInterface|
            RedirectionExceptionInterface|
            ServerExceptionInterface|
            ClientExceptionInterface $e) {
            error_log($e->getMessage());
        }
        return null;
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
}
