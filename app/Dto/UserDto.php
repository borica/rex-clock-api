<?php

namespace App\Dto;

class UserDto
{
    public $name;

    public function __construct(...$userParams)
    {
        $this->name = $userParams['user']['name'] ?? '';
    }
}