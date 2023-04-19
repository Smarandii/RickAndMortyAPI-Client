<?php
declare(strict_types=1);
require_once __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use RickAndMortyAPI\Dto\EpisodeFilter;


class EpisodeFilterTest extends TestCase
{
    public function testEpisodeFilterGettersSetters()
    {
        $filter = new EpisodeFilter();

        $filter->setName('Pilot');
        $filter->setEpisode('S01E01');

        $this->assertEquals('Pilot', $filter->getName());
        $this->assertEquals('S01E01', $filter->getEpisode());
    }

    public function testEpisodeFilterConstructor()
    {
        $filter_params = [
            'name' => 'Pilot',
            'episode' => 'S01E01'
        ];

        $filter = new EpisodeFilter($filter_params);

        $this->assertEquals($filter_params['name'], $filter->getName());
        $this->assertEquals($filter_params['episode'], $filter->getEpisode());
    }
}
