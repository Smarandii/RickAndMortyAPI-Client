<?php
require_once __DIR__ . '/../vendor/autoload.php';
use RickAndMortyAPI\Api;
use Symfony\Component\HttpClient\HttpClient;

$client = HttpClient::create();
$api_client = new Api($client);

var_dump($api_client->getLocation(1));