<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class RequestCountry extends Entity
{
    protected $attributes = [
        'id' => null,
        'country_id' => null,
        'request_id' => null
    ];
    protected $datamap = [];
    protected $dates   = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $casts   = [];
}
