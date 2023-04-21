<?php
declare(strict_types=1);
namespace Tests;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpClient\ScopingHttpClient;

trait RickAndMortyClientTestCaseTrait
{
    public function getHttpClient(): ScopingHttpClient
    {
        $client = HttpClient::create();
        $client = new ScopingHttpClient($client, []);
        $client = ScopingHttpClient::forBaseUri($client, 'https://rickandmortyapi.com/');
        return $client;
    }

    public function getWrongHttpClient(): ScopingHttpClient
    {
        $client = HttpClient::create();
        $client = new ScopingHttpClient($client, []);
        $client = ScopingHttpClient::forBaseUri($client, 'https://a.com/');
        return $client;
    }

}