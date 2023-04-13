<?php
declare(strict_types=1);
require_once __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use \RickAndMortyAPI\Config;

class ConfigTest extends TestCase {

    public function testConfig() {
        $expected = "https://rickandmortyapi.ru/";
        Config::setClientRootUrl("https://rickandmortyapi.ru/");
        $actual = Config::getClientRootUrl();
        $this->assertEquals($expected, $actual);
        Config::setClientRootUrl("https://rickandmortyapi.com/");
    }

}
