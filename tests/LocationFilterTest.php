<?php
declare(strict_types=1);
require_once __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use RickAndMortyAPI\Dto\LocationFilter;


class LocationFilterTest extends TestCase
{
    public function testLocationFilterGettersSetters()
    {
        $filter = new LocationFilter();

        $filter->setName('Earth (C-137)');
        $filter->setType('Planet');
        $filter->setDimension('Dimension C-137');

        $this->assertEquals('Earth (C-137)', $filter->getName());
        $this->assertEquals('Planet', $filter->getType());
        $this->assertEquals('Dimension C-137', $filter->getDimension());
    }

    public function testLocationFilterConstructor()
    {
        $filter_params = [
            'name' => 'Earth (C-137)',
            'type' => 'Planet',
            'dimension' => 'Dimension C-137'
        ];

        $filter = new LocationFilter($filter_params);

        $this->assertEquals($filter_params['name'], $filter->getName());
        $this->assertEquals($filter_params['type'], $filter->getType());
        $this->assertEquals($filter_params['dimension'], $filter->getDimension());
    }
}
