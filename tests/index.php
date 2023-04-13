<?php
echo "Welcome to tests!";

require_once __DIR__ . '/../vendor/autoload.php';

use RickAndMortyAPI\Api;
use Symfony\Component\HttpClient\HttpClient;
use RickAndMortyAPI\Dto\CharacterFilter;

$client = HttpClient::create();
$api_client = new Api($client);
$filter = new CharacterFilter(['name' => 'rick sanchez', 'status'=>'alive']);
var_dump($api_client->getCharacters($filter));
$actual = json_encode($api_client->getCharacters($filter), JSON_UNESCAPED_SLASHES);
var_dump($actual);