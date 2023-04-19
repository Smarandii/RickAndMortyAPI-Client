<?php
namespace RickAndMortyAPI;


class Config {
    private static string $clientRootUrl = "https://rickandmortyapi.com/";
    const CHARACTER_HANDLE = '/api/character/';
    const LOCATION_HANDLE = '/api/location/';
    const EPISODE_HANDLE = '/api/episode/';
    const GET_METHOD = 'GET';

    public static function setClientRootUrl($url) {
        self::$clientRootUrl = $url;
    }

    public static function getClientRootUrl() {

        return self::$clientRootUrl;
    }
}