<?php
declare(strict_types=1);
namespace RickAndMortyAPI\Dto;

interface FilterInterface
{
    public function getQueryParamsString(): string;
}