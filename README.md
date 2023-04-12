# Library for RickAndMortyAPI

[API documentation](https://rickandmortyapi.com/documentation/)

## How to install:

```cmd
composer require banki.ru/rick-and-morty-client
```

## How to use as a service container:

Edit file services.yaml in you symfony project:
<h5 a><strong><code>./config/services.yaml</code></strong></h5>
```yaml
    RickAndMortyAPI\:
        resource: '../vendor/banki.ru/rick-and-morty-client/src/'
```


## Composer Requirements:

- symfony/http-client: 5.4.*


## Use Cases:

```php
use RickAndMortyAPI\Api;

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