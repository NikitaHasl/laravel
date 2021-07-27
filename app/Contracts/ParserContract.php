<?php

namespace App\Contracts;

interface ParserContract
{
    public function getParsedList(string $url): array;
}
