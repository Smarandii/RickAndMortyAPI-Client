# Library for RickAndMortyAPI

[API documentation](https://rickandmortyapi.com/documentation/)

## How to install:

```cmd
composer require banki.ru/rick-and-morty-client
```

## Composer Requirements:

- symfony/http-client: 5.4.*


## Use Cases:

```php
use RickAndMortyAPI\Service\Api;

$api_client = new Api();

$character = $api_client->getCharacter(1);
echo $character->getName();

$characters = $api_client->getCharacters();
foreach ($characters as $character) {
    echo $character->getName();
}

$location = $api_client->getLocation(1);
echo $location->getName();

$locations = $api_client->getLocations()
foreach ($locations as $location) {
    echo $location->getName();
}
```