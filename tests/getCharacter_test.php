<?php
require_once __DIR__ . '/../vendor/autoload.php';
//namespace RickAndMortyAPI\Tests;

use RickAndMortyAPI\Api;
use Symfony\Component\HttpClient\HttpClient;

$client = HttpClient::create();
$api_client = new Api($client);

var_dump(json_encode($api_client->getCharacter(1)));