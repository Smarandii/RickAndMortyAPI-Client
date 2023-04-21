<?php
declare(strict_types=1);
namespace Tests;

use PHPUnit\Framework\TestCase;
use RickAndMortyAPI\Dto\CharacterFilter;

class CharacterFilterTest extends TestCase
{
    public function testCharacterFilterGettersAndSetters()
    {
        $filter = new CharacterFilter();

        $filter->setName("Rick Sanchez");
        $this->assertEquals("Rick Sanchez", $filter->getName());

        $filter->setStatus("Alive");
        $this->assertEquals("Alive", $filter->getStatus());

        $filter->setSpecies("Human");
        $this->assertEquals("Human", $filter->getSpecies());

        $filter->setType("");
        $this->assertEquals("", $filter->getType());

        $filter->setGender("Male");
        $this->assertEquals("Male", $filter->getGender());
    }
    public function testCharacterFilterConstructor()
    {
        $filter_params = [
            'name' => 'Rick Sanchez',
            'status' => 'Alive',
            'species' => 'Human',
            'type' => '',
            'gender' => 'Male'
        ];

        $filter = new CharacterFilter($filter_params);

        $this->assertEquals($filter_params['name'], $filter->getName());
        $this->assertEquals($filter_params['status'], $filter->getStatus());
        $this->assertEquals($filter_params['species'], $filter->getSpecies());
        $this->assertEquals($filter_params['type'], $filter->getType());
        $this->assertEquals($filter_params['gender'], $filter->getGender());
    }
}
