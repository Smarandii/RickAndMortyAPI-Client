<?php
require_once __DIR__ . '/../vendor/autoload.php';
//namespace RickAndMortyAPI\Tests;

use RickAndMortyAPI\Api;
use Symfony\Component\HttpClient\HttpClient;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;


$client = HttpClient::create();
$logger = new Logger('RickAndMortyLogger');
$logger->pushHandler(new StreamHandler(__DIR__ . '/../logs/app.log', Logger::DEBUG));
$api_client = new Api($client, $logger);

echo json_encode($api_client->getCharacter(1));