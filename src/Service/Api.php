<?php

namespace RickAndMortyAPI\Service;

use RickAndMortyAPI\Dto\Character;
use RickAndMortyAPI\Dto\Location;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;


class Api
{
    private HttpClientInterface $client;

    public function __construct()
    {
        $this->client = HttpClient::create();
    }

    private function unpackObjectIntoLocation($object, $location) {
        foreach ($object as $key => $value) {
            $setter = 'set' . ucfirst($key);
            $location->$setter($value);
        }
        return $location;
    }

    private function unpackObjectIntoCharacter($object, $character) {
        foreach ($object as $key => $value) {
            if ($key === "origin") {

                $origin = new Location();
                $value = $this->unpackObjectIntoLocation($value, $origin);

                $setter = 'set' . ucfirst($key);
                $character->$setter($value);
            } if ($key === "location") {

                $location = new Location();
                $value = $this->unpackObjectIntoLocation($value, $location);

                $setter = 'set' . ucfirst($key);
                $character->$setter($value);
            }
            else {
                $setter = 'set' . ucfirst($key);
                $character->$setter($value);
            }
        }
        return $character;
    }

    public function getCharacter(int $id): Character {
        $response = $this->client->request("GET", 'https://rickandmortyapi.com/api/character/' . $id);
        $content = $response->getContent();
        $object = json_decode($content);
        $character = new Character($id);
        return $this->unpackObjectIntoCharacter($object, $character);
    }

    public function getCharacters(): array {
        $response = $this->client->request("GET", 'https://rickandmortyapi.com/api/character/');
        $content = $response->getContent();
        $object = json_decode($content);
        $characters = [];
        foreach ($object->results as $character) {
            $character_model = new Character($character->id);
            $character_model = $this->unpackObjectIntoCharacter($character, $character_model);
            $characters[] = $character_model;
        }
        return $characters;
    }

    public function getLocation(int $id): Location {
        $response = $this->client->request("GET", 'https://rickandmortyapi.com/api/location/' . $id);
        $content = $response->getContent();
        $object = json_decode($content);
        $character = new Location();
        return $this->unpackObjectIntoLocation($object, $character);
    }

    public function getLocations(): array {
        $response = $this->client->request("GET", 'https://rickandmortyapi.com/api/location/');
        $content = $response->getContent();
        $object = json_decode($content);
        $locations = [];
        foreach ($object->results as $location) {
            $location_model = new Location();
            $location_model = $this->unpackObjectIntoLocation($location, $location_model);
            $locations[] = $location_model;
        }
        return $locations;
    }


}