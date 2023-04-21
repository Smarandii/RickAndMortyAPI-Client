<?php
declare(strict_types=1);
namespace Tests;

use RickAndMortyAPI\Api;
use RickAndMortyAPI\Dto\Location;
use Symfony\Component\HttpClient\HttpClient;
use PHPUnit\Framework\TestCase;
use RickAndMortyAPI\Dto\LocationFilter;


class LocationTest  extends TestCase {
    use RickAndMortyClientTestCaseTrait;
    public function testGetLocation() {
        $client = $this->getHttpClient();
        $api_client = new Api($client);
        $expected = '{"id":1,"name":"Earth (C-137)","type":"Planet","dimension":"Dimension C-137","residents":["https://rickandmortyapi.com/api/character/38","https://rickandmortyapi.com/api/character/45","https://rickandmortyapi.com/api/character/71","https://rickandmortyapi.com/api/character/82","https://rickandmortyapi.com/api/character/83","https://rickandmortyapi.com/api/character/92","https://rickandmortyapi.com/api/character/112","https://rickandmortyapi.com/api/character/114","https://rickandmortyapi.com/api/character/116","https://rickandmortyapi.com/api/character/117","https://rickandmortyapi.com/api/character/120","https://rickandmortyapi.com/api/character/127","https://rickandmortyapi.com/api/character/155","https://rickandmortyapi.com/api/character/169","https://rickandmortyapi.com/api/character/175","https://rickandmortyapi.com/api/character/179","https://rickandmortyapi.com/api/character/186","https://rickandmortyapi.com/api/character/201","https://rickandmortyapi.com/api/character/216","https://rickandmortyapi.com/api/character/239","https://rickandmortyapi.com/api/character/271","https://rickandmortyapi.com/api/character/302","https://rickandmortyapi.com/api/character/303","https://rickandmortyapi.com/api/character/338","https://rickandmortyapi.com/api/character/343","https://rickandmortyapi.com/api/character/356","https://rickandmortyapi.com/api/character/394"],"url":"https://rickandmortyapi.com/api/location/1","created":"2017-11-10T12:42:04.162Z"}';
        $actual = json_encode($api_client->getLocation(1), JSON_UNESCAPED_SLASHES);
        $this->assertEquals($expected, $actual);
    }

    public function testGetLocationsByNameAndType() {
        $client = $this->getHttpClient();
        $api_client = new Api($client);
        $filter = new LocationFilter(['name' => 'Earth (C-137)', 'type'=>'planet']);
        $expected = '[{"id":1,"name":"Earth (C-137)","type":"Planet","dimension":"Dimension C-137","residents":["https://rickandmortyapi.com/api/character/38","https://rickandmortyapi.com/api/character/45","https://rickandmortyapi.com/api/character/71","https://rickandmortyapi.com/api/character/82","https://rickandmortyapi.com/api/character/83","https://rickandmortyapi.com/api/character/92","https://rickandmortyapi.com/api/character/112","https://rickandmortyapi.com/api/character/114","https://rickandmortyapi.com/api/character/116","https://rickandmortyapi.com/api/character/117","https://rickandmortyapi.com/api/character/120","https://rickandmortyapi.com/api/character/127","https://rickandmortyapi.com/api/character/155","https://rickandmortyapi.com/api/character/169","https://rickandmortyapi.com/api/character/175","https://rickandmortyapi.com/api/character/179","https://rickandmortyapi.com/api/character/186","https://rickandmortyapi.com/api/character/201","https://rickandmortyapi.com/api/character/216","https://rickandmortyapi.com/api/character/239","https://rickandmortyapi.com/api/character/271","https://rickandmortyapi.com/api/character/302","https://rickandmortyapi.com/api/character/303","https://rickandmortyapi.com/api/character/338","https://rickandmortyapi.com/api/character/343","https://rickandmortyapi.com/api/character/356","https://rickandmortyapi.com/api/character/394"],"url":"https://rickandmortyapi.com/api/location/1","created":"2017-11-10T12:42:04.162Z"}]';
        $actual = json_encode($api_client->getLocations($filter), JSON_UNESCAPED_SLASHES);
        $this->assertEquals($expected, $actual);
    }

    public function testGetLocationsByMultipleIds() {
        $client = $this->getHttpClient();
        $api_client = new Api($client);
        $filter = new LocationFilter(['ids' => [40,39]]);
        $expected = '[{"id":39,"name":"Galactic Federation Prison","type":"Space station","dimension":"unknown","residents":["https://rickandmortyapi.com/api/character/150"],"url":"https://rickandmortyapi.com/api/location/39","created":"2017-12-29T12:02:33.513Z"},{"id":40,"name":"Gazorpazorp","type":"Planet","dimension":"unknown","residents":["https://rickandmortyapi.com/api/character/168","https://rickandmortyapi.com/api/character/211","https://rickandmortyapi.com/api/character/376"],"url":"https://rickandmortyapi.com/api/location/40","created":"2017-12-29T12:31:50.313Z"}]';
        $actual = json_encode($api_client->getLocations($filter), JSON_UNESCAPED_SLASHES);
        $this->assertEquals($expected, $actual);
    }


    public function testLocationGetters() {
        $client = $this->getHttpClient();
        $api_client = new Api($client);
        $location = $api_client->getLocation(1);

        $this->assertEquals(1, $location->getId());
        $this->assertEquals("Earth (C-137)", $location->getName());
        $this->assertEquals("Planet", $location->getType());
        $this->assertEquals("Dimension C-137", $location->getDimension());
        $residents = ["https://rickandmortyapi.com/api/character/38","https://rickandmortyapi.com/api/character/45","https://rickandmortyapi.com/api/character/71","https://rickandmortyapi.com/api/character/82","https://rickandmortyapi.com/api/character/83","https://rickandmortyapi.com/api/character/92","https://rickandmortyapi.com/api/character/112","https://rickandmortyapi.com/api/character/114","https://rickandmortyapi.com/api/character/116","https://rickandmortyapi.com/api/character/117","https://rickandmortyapi.com/api/character/120","https://rickandmortyapi.com/api/character/127","https://rickandmortyapi.com/api/character/155","https://rickandmortyapi.com/api/character/169","https://rickandmortyapi.com/api/character/175","https://rickandmortyapi.com/api/character/179","https://rickandmortyapi.com/api/character/186","https://rickandmortyapi.com/api/character/201","https://rickandmortyapi.com/api/character/216","https://rickandmortyapi.com/api/character/239","https://rickandmortyapi.com/api/character/271","https://rickandmortyapi.com/api/character/302","https://rickandmortyapi.com/api/character/303","https://rickandmortyapi.com/api/character/338","https://rickandmortyapi.com/api/character/343","https://rickandmortyapi.com/api/character/356","https://rickandmortyapi.com/api/character/394"];
        $this->assertEquals($residents, $location->getResidents());
        $this->assertEquals("https://rickandmortyapi.com/api/location/1", $location->getUrl());
        $this->assertEquals("2017-11-10T12:42:04.162Z", $location->getCreated());

    }

    public function testLocationSetters()
    {
        $location = new Location();

        $location->setId(1);
        $this->assertEquals(1, $location->getId());

        $location->setName("Earth (C-137)");
        $this->assertEquals("Earth (C-137)", $location->getName());

        $location->setType("Planet");
        $this->assertEquals("Planet", $location->getType());

        $location->setDimension("Dimension C-137");
        $this->assertEquals("Dimension C-137", $location->getDimension());

        $residents = ["https://rickandmortyapi.com/api/character/38","https://rickandmortyapi.com/api/character/45","https://rickandmortyapi.com/api/character/71","https://rickandmortyapi.com/api/character/82","https://rickandmortyapi.com/api/character/83","https://rickandmortyapi.com/api/character/92","https://rickandmortyapi.com/api/character/112","https://rickandmortyapi.com/api/character/114","https://rickandmortyapi.com/api/character/116","https://rickandmortyapi.com/api/character/117","https://rickandmortyapi.com/api/character/120","https://rickandmortyapi.com/api/character/127","https://rickandmortyapi.com/api/character/155","https://rickandmortyapi.com/api/character/169","https://rickandmortyapi.com/api/character/175","https://rickandmortyapi.com/api/character/179","https://rickandmortyapi.com/api/character/186","https://rickandmortyapi.com/api/character/201","https://rickandmortyapi.com/api/character/216","https://rickandmortyapi.com/api/character/239","https://rickandmortyapi.com/api/character/271","https://rickandmortyapi.com/api/character/302","https://rickandmortyapi.com/api/character/303","https://rickandmortyapi.com/api/character/338","https://rickandmortyapi.com/api/character/343","https://rickandmortyapi.com/api/character/356","https://rickandmortyapi.com/api/character/394"];
        $location->setResidents($residents);
        $this->assertEquals($residents, $location->getResidents());

        $location->setUrl("https://rickandmortyapi.com/api/location/1");
        $this->assertEquals("https://rickandmortyapi.com/api/location/1", $location->getUrl());

        $location->setCreated("2017-11-10T12:42:04.162Z");
        $this->assertEquals("2017-11-10T12:42:04.162Z", $location->getCreated());
    }


}