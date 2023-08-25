<?php

namespace App\Dto;

class CompanyDto
{
    public $name;

    public function __construct(...$companyParams)
    {
        $this->name = $companyParams['company']['name'] ?? '';
    }
}