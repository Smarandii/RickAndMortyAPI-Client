<?php
declare(strict_types=1);

namespace Tests;
use RickAndMortyAPI\Api;
use RickAndMortyAPI\Dto\Character;
use RickAndMortyAPI\Dto\Location;
use PHPUnit\Framework\TestCase;
use RickAndMortyAPI\Dto\CharacterFilter;
use Symfony\Component\HttpClient\Exception\ClientException;
use Symfony\Component\HttpClient\Exception\TransportException;


class CharacterTest extends TestCase {
    use RickAndMortyClientTestCaseTrait;
    public function testGetCharacter() {
        $client = $this->getHttpClient();
        $api_client = new Api($client);
        $expected = '{"id":1,"name":"Rick Sanchez","status":"Alive","species":"Human","type":"","gender":"Male","origin":{"name":"Earth (C-137)","url":"https://rickandmortyapi.com/api/location/1"},"location":{"name":"Citadel of Ricks","url":"https://rickandmortyapi.com/api/location/3"},"image":"https://rickandmortyapi.com/api/character/avatar/1.jpeg","episode":["https://rickandmortyapi.com/api/episode/1","https://rickandmortyapi.com/api/episode/2","https://rickandmortyapi.com/api/episode/3","https://rickandmortyapi.com/api/episode/4","https://rickandmortyapi.com/api/episode/5","https://rickandmortyapi.com/api/episode/6","https://rickandmortyapi.com/api/episode/7","https://rickandmortyapi.com/api/episode/8","https://rickandmortyapi.com/api/episode/9","https://rickandmortyapi.com/api/episode/10","https://rickandmortyapi.com/api/episode/11","https://rickandmortyapi.com/api/episode/12","https://rickandmortyapi.com/api/episode/13","https://rickandmortyapi.com/api/episode/14","https://rickandmortyapi.com/api/episode/15","https://rickandmortyapi.com/api/episode/16","https://rickandmortyapi.com/api/episode/17","https://rickandmortyapi.com/api/episode/18","https://rickandmortyapi.com/api/episode/19","https://rickandmortyapi.com/api/episode/20","https://rickandmortyapi.com/api/episode/21","https://rickandmortyapi.com/api/episode/22","https://rickandmortyapi.com/api/episode/23","https://rickandmortyapi.com/api/episode/24","https://rickandmortyapi.com/api/episode/25","https://rickandmortyapi.com/api/episode/26","https://rickandmortyapi.com/api/episode/27","https://rickandmortyapi.com/api/episode/28","https://rickandmortyapi.com/api/episode/29","https://rickandmortyapi.com/api/episode/30","https://rickandmortyapi.com/api/episode/31","https://rickandmortyapi.com/api/episode/32","https://rickandmortyapi.com/api/episode/33","https://rickandmortyapi.com/api/episode/34","https://rickandmortyapi.com/api/episode/35","https://rickandmortyapi.com/api/episode/36","https://rickandmortyapi.com/api/episode/37","https://rickandmortyapi.com/api/episode/38","https://rickandmortyapi.com/api/episode/39","https://rickandmortyapi.com/api/episode/40","https://rickandmortyapi.com/api/episode/41","https://rickandmortyapi.com/api/episode/42","https://rickandmortyapi.com/api/episode/43","https://rickandmortyapi.com/api/episode/44","https://rickandmortyapi.com/api/episode/45","https://rickandmortyapi.com/api/episode/46","https://rickandmortyapi.com/api/episode/47","https://rickandmortyapi.com/api/episode/48","https://rickandmortyapi.com/api/episode/49","https://rickandmortyapi.com/api/episode/50","https://rickandmortyapi.com/api/episode/51"],"url":"https://rickandmortyapi.com/api/character/1","created":"2017-11-04T18:48:46.250Z"}';
        $actual = json_encode($api_client->getCharacter(1), JSON_UNESCAPED_SLASHES);
        $this->assertEquals($expected, $actual);
    }

    public function testGetCharacterThatIsNotFound() {
        $client = $this->getHttpClient();
        $api_client = new Api($client);
        $this->expectException(ClientException::class);
        json_encode($api_client->getCharacter(1000), JSON_UNESCAPED_SLASHES);
    }

    public function testGetCharacterWithWrongClient() {
        $client = $this->getWrongHttpClient();
        $api_client = new Api($client);
        $this->expectException(TransportException::class);
        json_encode($api_client->getCharacter(1), JSON_UNESCAPED_SLASHES);
    }

    public function testGetCharactersByNameAndStatus() {
        $client = $this->getHttpClient();
        $api_client = new Api($client);
        $filter = new CharacterFilter(['name' => 'rick sanchez', 'status'=>'alive']);
        $expected = '[{"id":1,"name":"Rick Sanchez","status":"Alive","species":"Human","type":"","gender":"Male","origin":{"name":"Earth (C-137)","url":"https://rickandmortyapi.com/api/location/1"},"location":{"name":"Citadel of Ricks","url":"https://rickandmortyapi.com/api/location/3"},"image":"https://rickandmortyapi.com/api/character/avatar/1.jpeg","episode":["https://rickandmortyapi.com/api/episode/1","https://rickandmortyapi.com/api/episode/2","https://rickandmortyapi.com/api/episode/3","https://rickandmortyapi.com/api/episode/4","https://rickandmortyapi.com/api/episode/5","https://rickandmortyapi.com/api/episode/6","https://rickandmortyapi.com/api/episode/7","https://rickandmortyapi.com/api/episode/8","https://rickandmortyapi.com/api/episode/9","https://rickandmortyapi.com/api/episode/10","https://rickandmortyapi.com/api/episode/11","https://rickandmortyapi.com/api/episode/12","https://rickandmortyapi.com/api/episode/13","https://rickandmortyapi.com/api/episode/14","https://rickandmortyapi.com/api/episode/15","https://rickandmortyapi.com/api/episode/16","https://rickandmortyapi.com/api/episode/17","https://rickandmortyapi.com/api/episode/18","https://rickandmortyapi.com/api/episode/19","https://rickandmortyapi.com/api/episode/20","https://rickandmortyapi.com/api/episode/21","https://rickandmortyapi.com/api/episode/22","https://rickandmortyapi.com/api/episode/23","https://rickandmortyapi.com/api/episode/24","https://rickandmortyapi.com/api/episode/25","https://rickandmortyapi.com/api/episode/26","https://rickandmortyapi.com/api/episode/27","https://rickandmortyapi.com/api/episode/28","https://rickandmortyapi.com/api/episode/29","https://rickandmortyapi.com/api/episode/30","https://rickandmortyapi.com/api/episode/31","https://rickandmortyapi.com/api/episode/32","https://rickandmortyapi.com/api/episode/33","https://rickandmortyapi.com/api/episode/34","https://rickandmortyapi.com/api/episode/35","https://rickandmortyapi.com/api/episode/36","https://rickandmortyapi.com/api/episode/37","https://rickandmortyapi.com/api/episode/38","https://rickandmortyapi.com/api/episode/39","https://rickandmortyapi.com/api/episode/40","https://rickandmortyapi.com/api/episode/41","https://rickandmortyapi.com/api/episode/42","https://rickandmortyapi.com/api/episode/43","https://rickandmortyapi.com/api/episode/44","https://rickandmortyapi.com/api/episode/45","https://rickandmortyapi.com/api/episode/46","https://rickandmortyapi.com/api/episode/47","https://rickandmortyapi.com/api/episode/48","https://rickandmortyapi.com/api/episode/49","https://rickandmortyapi.com/api/episode/50","https://rickandmortyapi.com/api/episode/51"],"url":"https://rickandmortyapi.com/api/character/1","created":"2017-11-04T18:48:46.250Z"},{"id":631,"name":"Rick Sanchez","status":"Alive","species":"Human","type":"Soulless Puppet","gender":"Male","origin":{"name":"Story Train","url":"https://rickandmortyapi.com/api/location/96"},"location":{"name":"Story Train","url":"https://rickandmortyapi.com/api/location/96"},"image":"https://rickandmortyapi.com/api/character/avatar/631.jpeg","episode":["https://rickandmortyapi.com/api/episode/37"],"url":"https://rickandmortyapi.com/api/character/631","created":"2020-08-06T16:39:08.485Z"}]';
        $actual = json_encode($api_client->getCharacters($filter), JSON_UNESCAPED_SLASHES);
        $this->assertEquals($expected, $actual);
    }

    public function testGetCharactersByMultipleIds() {
        $client = $this->getHttpClient();
        $api_client = new Api($client);
        $filter = new CharacterFilter(['ids' => [1, 183]]);
        $expected = '[{"id":1,"name":"Rick Sanchez","status":"Alive","species":"Human","type":"","gender":"Male","origin":{"name":"Earth (C-137)","url":"https://rickandmortyapi.com/api/location/1"},"location":{"name":"Citadel of Ricks","url":"https://rickandmortyapi.com/api/location/3"},"image":"https://rickandmortyapi.com/api/character/avatar/1.jpeg","episode":["https://rickandmortyapi.com/api/episode/1","https://rickandmortyapi.com/api/episode/2","https://rickandmortyapi.com/api/episode/3","https://rickandmortyapi.com/api/episode/4","https://rickandmortyapi.com/api/episode/5","https://rickandmortyapi.com/api/episode/6","https://rickandmortyapi.com/api/episode/7","https://rickandmortyapi.com/api/episode/8","https://rickandmortyapi.com/api/episode/9","https://rickandmortyapi.com/api/episode/10","https://rickandmortyapi.com/api/episode/11","https://rickandmortyapi.com/api/episode/12","https://rickandmortyapi.com/api/episode/13","https://rickandmortyapi.com/api/episode/14","https://rickandmortyapi.com/api/episode/15","https://rickandmortyapi.com/api/episode/16","https://rickandmortyapi.com/api/episode/17","https://rickandmortyapi.com/api/episode/18","https://rickandmortyapi.com/api/episode/19","https://rickandmortyapi.com/api/episode/20","https://rickandmortyapi.com/api/episode/21","https://rickandmortyapi.com/api/episode/22","https://rickandmortyapi.com/api/episode/23","https://rickandmortyapi.com/api/episode/24","https://rickandmortyapi.com/api/episode/25","https://rickandmortyapi.com/api/episode/26","https://rickandmortyapi.com/api/episode/27","https://rickandmortyapi.com/api/episode/28","https://rickandmortyapi.com/api/episode/29","https://rickandmortyapi.com/api/episode/30","https://rickandmortyapi.com/api/episode/31","https://rickandmortyapi.com/api/episode/32","https://rickandmortyapi.com/api/episode/33","https://rickandmortyapi.com/api/episode/34","https://rickandmortyapi.com/api/episode/35","https://rickandmortyapi.com/api/episode/36","https://rickandmortyapi.com/api/episode/37","https://rickandmortyapi.com/api/episode/38","https://rickandmortyapi.com/api/episode/39","https://rickandmortyapi.com/api/episode/40","https://rickandmortyapi.com/api/episode/41","https://rickandmortyapi.com/api/episode/42","https://rickandmortyapi.com/api/episode/43","https://rickandmortyapi.com/api/episode/44","https://rickandmortyapi.com/api/episode/45","https://rickandmortyapi.com/api/episode/46","https://rickandmortyapi.com/api/episode/47","https://rickandmortyapi.com/api/episode/48","https://rickandmortyapi.com/api/episode/49","https://rickandmortyapi.com/api/episode/50","https://rickandmortyapi.com/api/episode/51"],"url":"https://rickandmortyapi.com/api/character/1","created":"2017-11-04T18:48:46.250Z"},{"id":183,"name":"Johnny Depp","status":"Alive","species":"Human","type":"","gender":"Male","origin":{"name":"Earth (C-500A)","url":"https://rickandmortyapi.com/api/location/23"},"location":{"name":"Earth (C-500A)","url":"https://rickandmortyapi.com/api/location/23"},"image":"https://rickandmortyapi.com/api/character/avatar/183.jpeg","episode":["https://rickandmortyapi.com/api/episode/8"],"url":"https://rickandmortyapi.com/api/character/183","created":"2017-12-29T18:51:29.693Z"}]';
        $actual = json_encode($api_client->getCharacters($filter), JSON_UNESCAPED_SLASHES);
        $this->assertEquals($expected, $actual);
    }

    public function testCharacterGetters() {
        $client = $this->getHttpClient();
        $api_client = new Api($client);
        $character = $api_client->getCharacter(1);

        $this->assertEquals(1, $character->getId());
        $this->assertEquals("Rick Sanchez", $character->getName());
        $this->assertEquals("Alive", $character->getStatus());
        $this->assertEquals("Human", $character->getSpecies());
        $this->assertEquals("", $character->getType());
        $this->assertEquals("Male", $character->getGender());

        $origin = new Location();
        $origin->setName("Earth (C-137)");
        $origin->setUrl("https://rickandmortyapi.com/api/location/1");
        $origin->setId(null);
        $origin->setType(null);
        $origin->setDimension(null);
        $origin->setResidents(null);
        $origin->setCreated(null);

        $this->assertEquals($origin, $character->getOrigin());

        $location = new Location();
        $location->setName("Citadel of Ricks");
        $location->setUrl("https://rickandmortyapi.com/api/location/3");
        $location->setId(null);
        $location->setType(null);
        $location->setDimension(null);
        $location->setResidents(null);
        $location->setCreated(null);

        $this->assertEquals($location, $character->getLocation());

        $this->assertEquals("https://rickandmortyapi.com/api/character/avatar/1.jpeg", $character->getImage());
        $episodes = ["https://rickandmortyapi.com/api/episode/1","https://rickandmortyapi.com/api/episode/2","https://rickandmortyapi.com/api/episode/3","https://rickandmortyapi.com/api/episode/4","https://rickandmortyapi.com/api/episode/5","https://rickandmortyapi.com/api/episode/6","https://rickandmortyapi.com/api/episode/7","https://rickandmortyapi.com/api/episode/8","https://rickandmortyapi.com/api/episode/9","https://rickandmortyapi.com/api/episode/10","https://rickandmortyapi.com/api/episode/11","https://rickandmortyapi.com/api/episode/12","https://rickandmortyapi.com/api/episode/13","https://rickandmortyapi.com/api/episode/14","https://rickandmortyapi.com/api/episode/15","https://rickandmortyapi.com/api/episode/16","https://rickandmortyapi.com/api/episode/17","https://rickandmortyapi.com/api/episode/18","https://rickandmortyapi.com/api/episode/19","https://rickandmortyapi.com/api/episode/20","https://rickandmortyapi.com/api/episode/21","https://rickandmortyapi.com/api/episode/22","https://rickandmortyapi.com/api/episode/23","https://rickandmortyapi.com/api/episode/24","https://rickandmortyapi.com/api/episode/25","https://rickandmortyapi.com/api/episode/26","https://rickandmortyapi.com/api/episode/27","https://rickandmortyapi.com/api/episode/28","https://rickandmortyapi.com/api/episode/29","https://rickandmortyapi.com/api/episode/30","https://rickandmortyapi.com/api/episode/31","https://rickandmortyapi.com/api/episode/32","https://rickandmortyapi.com/api/episode/33","https://rickandmortyapi.com/api/episode/34","https://rickandmortyapi.com/api/episode/35","https://rickandmortyapi.com/api/episode/36","https://rickandmortyapi.com/api/episode/37","https://rickandmortyapi.com/api/episode/38","https://rickandmortyapi.com/api/episode/39","https://rickandmortyapi.com/api/episode/40","https://rickandmortyapi.com/api/episode/41","https://rickandmortyapi.com/api/episode/42","https://rickandmortyapi.com/api/episode/43","https://rickandmortyapi.com/api/episode/44","https://rickandmortyapi.com/api/episode/45","https://rickandmortyapi.com/api/episode/46","https://rickandmortyapi.com/api/episode/47","https://rickandmortyapi.com/api/episode/48","https://rickandmortyapi.com/api/episode/49","https://rickandmortyapi.com/api/episode/50","https://rickandmortyapi.com/api/episode/51"];
        $this->assertEquals($episodes, $character->getEpisode());
        $this->assertEquals("https://rickandmortyapi.com/api/character/1", $character->getUrl());
        $this->assertEquals("2017-11-04T18:48:46.250Z", $character->getCreated());

    }

    public function testCharacterSetters()
    {
        $character = new Character();

        $character->setId(1);
        $character->setName("Rick Sanchez");
        $character->setStatus("Alive");
        $character->setSpecies("Human");
        $character->setType("");
        $character->setGender("Male");

        $this->assertEquals(1, $character->getId());
        $this->assertEquals("Rick Sanchez", $character->getName());
        $this->assertEquals("Alive", $character->getStatus());
        $this->assertEquals("Human", $character->getSpecies());
        $this->assertEquals("", $character->getType());
        $this->assertEquals("Male", $character->getGender());

        $origin = new Location();
        $origin->setName("Earth (C-137)");
        $origin->setUrl("https://rickandmortyapi.com/api/location/1");
        $origin->setId(null);
        $origin->setType(null);
        $origin->setDimension(null);
        $origin->setResidents(null);
        $origin->setCreated(null);

        $character->setOrigin($origin);
        $this->assertEquals($origin, $character->getOrigin());

        $location = new Location();
        $location->setName("Citadel of Ricks");
        $location->setUrl("https://rickandmortyapi.com/api/location/3");
        $location->setId(null);
        $location->setType(null);
        $location->setDimension(null);
        $location->setResidents(null);
        $location->setCreated(null);

        $character->setLocation($location);
        $this->assertEquals($location, $character->getLocation());

        $character->setImage("https://rickandmortyapi.com/api/character/avatar/1.jpeg");
        $this->assertEquals("https://rickandmortyapi.com/api/character/avatar/1.jpeg", $character->getImage());

        $episodes = ["https://rickandmortyapi.com/api/episode/1", "https://rickandmortyapi.com/api/episode/2", "https://rickandmortyapi.com/api/episode/3", "https://rickandmortyapi.com/api/episode/4", "https://rickandmortyapi.com/api/episode/5", "https://rickandmortyapi.com/api/episode/6", "https://rickandmortyapi.com/api/episode/7", "https://rickandmortyapi.com/api/episode/8", "https://rickandmortyapi.com/api/episode/9", "https://rickandmortyapi.com/api/episode/10", "https://rickandmortyapi.com/api/episode/11", "https://rickandmortyapi.com/api/episode/12", "https://rickandmortyapi.com/api/episode/13", "https://rickandmortyapi.com/api/episode/14", "https://rickandmortyapi.com/api/episode/15", "https://rickandmortyapi.com/api/episode/16", "https://rickandmortyapi.com/api/episode/17", "https://rickandmortyapi.com/api/episode/18", "https://rickandmortyapi.com/api/episode/19", "https://rickandmortyapi.com/api/episode/20", "https://rickandmortyapi.com/api/episode/21", "https://rickandmortyapi.com/api/episode/22", "https://rickandmortyapi.com/api/episode/23", "https://rickandmortyapi.com/api/episode/24", "https://rickandmortyapi.com/api/episode/25", "https://rickandmortyapi.com/api/episode/26", "https://rickandmortyapi.com/api/episode/27", "https://rickandmortyapi.com/api/episode/28", "https://rickandmortyapi.com/api/episode/29", "https://rickandmortyapi.com/api/episode/30", "https://rickandmortyapi.com/api/episode/31", "https://rickandmortyapi.com/api/episode/32", "https://rickandmortyapi.com/api/episode/33", "https://rickandmortyapi.com/api/episode/34", "https://rickandmortyapi.com/api/episode/35", "https://rickandmortyapi.com/api/episode/36", "https://rickandmortyapi.com/api/episode/37", "https://rickandmortyapi.com/api/episode/38", "https://rickandmortyapi.com/api/episode/39", "https://rickandmortyapi.com/api/episode/40", "https://rickandmortyapi.com/api/episode/41", "https://rickandmortyapi.com/api/episode/42", "https://rickandmortyapi.com/api/episode/43", "https://rickandmortyapi.com/api/episode/44", "https://rickandmortyapi.com/api/episode/45", "https://rickandmortyapi.com/api/episode/46", "https://rickandmortyapi.com/api/episode/47", "https://rickandmortyapi.com/api/episode/48", "https://rickandmortyapi.com/api/episode/49", "https://rickandmortyapi.com/api/episode/50", "https://rickandmortyapi.com/api/episode/51"];

        $character->setEpisode($episodes);
        $this->assertEquals($episodes, $character->getEpisode());

        $character->setUrl("https://rickandmortyapi.com/api/character/1");
        $this->assertEquals("https://rickandmortyapi.com/api/character/1", $character->getUrl());

        $character->setCreated("2017-11-04T18:48:46.250Z");
        $this->assertEquals("2017-11-04T18:48:46.250Z", $character->getCreated());
    }

}