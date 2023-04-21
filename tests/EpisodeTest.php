<?php
declare(strict_types=1);
namespace Tests;

use RickAndMortyAPI\Api;
use RickAndMortyAPI\Dto\Episode;
use RickAndMortyAPI\Dto\EpisodeFilter;
use PHPUnit\Framework\TestCase;


class EpisodeTest extends TestCase {
    use RickAndMortyClientTestCaseTrait;
    public function testGetEpisode() {
        $client = $this->getHttpClient();
        $api_client = new Api($client);
        $expected = '{"id":1,"name":"Pilot","air_date":"December 2, 2013","episode":"S01E01","characters":["https://rickandmortyapi.com/api/character/1","https://rickandmortyapi.com/api/character/2","https://rickandmortyapi.com/api/character/35","https://rickandmortyapi.com/api/character/38","https://rickandmortyapi.com/api/character/62","https://rickandmortyapi.com/api/character/92","https://rickandmortyapi.com/api/character/127","https://rickandmortyapi.com/api/character/144","https://rickandmortyapi.com/api/character/158","https://rickandmortyapi.com/api/character/175","https://rickandmortyapi.com/api/character/179","https://rickandmortyapi.com/api/character/181","https://rickandmortyapi.com/api/character/239","https://rickandmortyapi.com/api/character/249","https://rickandmortyapi.com/api/character/271","https://rickandmortyapi.com/api/character/338","https://rickandmortyapi.com/api/character/394","https://rickandmortyapi.com/api/character/395","https://rickandmortyapi.com/api/character/435"],"url":"https://rickandmortyapi.com/api/episode/1","created":"2017-11-10T12:56:33.798Z"}';
        $actual = json_encode($api_client->getEpisode(1), JSON_UNESCAPED_SLASHES);
        $this->assertEquals($expected, $actual);
    }

    public function testGetEpisodes() {
        $client = $this->getHttpClient();
        $api_client = new Api($client);
        $filter = new EpisodeFilter(['name' => 'Pilot', 'episode'=>'S01E01']);
        $expected = '[{"id":1,"name":"Pilot","air_date":"December 2, 2013","episode":"S01E01","characters":["https://rickandmortyapi.com/api/character/1","https://rickandmortyapi.com/api/character/2","https://rickandmortyapi.com/api/character/35","https://rickandmortyapi.com/api/character/38","https://rickandmortyapi.com/api/character/62","https://rickandmortyapi.com/api/character/92","https://rickandmortyapi.com/api/character/127","https://rickandmortyapi.com/api/character/144","https://rickandmortyapi.com/api/character/158","https://rickandmortyapi.com/api/character/175","https://rickandmortyapi.com/api/character/179","https://rickandmortyapi.com/api/character/181","https://rickandmortyapi.com/api/character/239","https://rickandmortyapi.com/api/character/249","https://rickandmortyapi.com/api/character/271","https://rickandmortyapi.com/api/character/338","https://rickandmortyapi.com/api/character/394","https://rickandmortyapi.com/api/character/395","https://rickandmortyapi.com/api/character/435"],"url":"https://rickandmortyapi.com/api/episode/1","created":"2017-11-10T12:56:33.798Z"}]';
        $actual = json_encode($api_client->getEpisodes($filter), JSON_UNESCAPED_SLASHES);
        $this->assertEquals($expected, $actual);
    }

    public function testEpisodeGetters() {
        $client = $this->getHttpClient();
        $api_client = new Api($client);
        $location = $api_client->getEpisode(1);

        $this->assertEquals(1, $location->getId());
        $this->assertEquals("Pilot", $location->getName());
        $this->assertEquals("December 2, 2013", $location->getAirDate());
        $this->assertEquals("S01E01", $location->getEpisode());
        $characters = ["https://rickandmortyapi.com/api/character/1","https://rickandmortyapi.com/api/character/2","https://rickandmortyapi.com/api/character/35","https://rickandmortyapi.com/api/character/38","https://rickandmortyapi.com/api/character/62","https://rickandmortyapi.com/api/character/92","https://rickandmortyapi.com/api/character/127","https://rickandmortyapi.com/api/character/144","https://rickandmortyapi.com/api/character/158","https://rickandmortyapi.com/api/character/175","https://rickandmortyapi.com/api/character/179","https://rickandmortyapi.com/api/character/181","https://rickandmortyapi.com/api/character/239","https://rickandmortyapi.com/api/character/249","https://rickandmortyapi.com/api/character/271","https://rickandmortyapi.com/api/character/338","https://rickandmortyapi.com/api/character/394","https://rickandmortyapi.com/api/character/395","https://rickandmortyapi.com/api/character/435"];
        $this->assertEquals($characters, $location->getCharacters());
        $this->assertEquals("https://rickandmortyapi.com/api/episode/1", $location->getUrl());
        $this->assertEquals("2017-11-10T12:56:33.798Z", $location->getCreated());
    }

    public function testEpisodeSetters()
    {
        $episode = new Episode();

        $episode->setId(1);
        $this->assertEquals(1, $episode->getId());

        $episode->setName("Pilot");
        $this->assertEquals("Pilot", $episode->getName());

        $episode->setAirDate("December 2, 2013");
        $this->assertEquals("December 2, 2013", $episode->getAirDate());

        $episode->setEpisode("S01E01");
        $this->assertEquals("S01E01", $episode->getEpisode());

        $characters = ["https://rickandmortyapi.com/api/character/1","https://rickandmortyapi.com/api/character/2","https://rickandmortyapi.com/api/character/35","https://rickandmortyapi.com/api/character/38","https://rickandmortyapi.com/api/character/62","https://rickandmortyapi.com/api/character/92","https://rickandmortyapi.com/api/character/127","https://rickandmortyapi.com/api/character/144","https://rickandmortyapi.com/api/character/158","https://rickandmortyapi.com/api/character/175","https://rickandmortyapi.com/api/character/179","https://rickandmortyapi.com/api/character/181","https://rickandmortyapi.com/api/character/239","https://rickandmortyapi.com/api/character/249","https://rickandmortyapi.com/api/character/271","https://rickandmortyapi.com/api/character/338","https://rickandmortyapi.com/api/character/394","https://rickandmortyapi.com/api/character/395","https://rickandmortyapi.com/api/character/435"];
        $episode->setCharacters($characters);
        $this->assertEquals($characters, $episode->getCharacters());

        $episode->setUrl("https://rickandmortyapi.com/api/episode/1");
        $this->assertEquals("https://rickandmortyapi.com/api/episode/1", $episode->getUrl());

        $episode->setCreated("2017-11-10T12:56:33.798Z");
        $this->assertEquals("2017-11-10T12:56:33.798Z", $episode->getCreated());
    }



}