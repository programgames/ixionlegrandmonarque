<?php

namespace App\LoLDataGetter\ApiType;

interface APIType
{
    public function getName(): string;

    public function getDescription(): string;

    public function getDocUrl(): string;
}
