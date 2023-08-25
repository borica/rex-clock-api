<?php

namespace App\Dto;

class SessionDto
{
    public function __construct(
        public UserDto $user,
        public CompanyDto $company
    ) {
    }
}