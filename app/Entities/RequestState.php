<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class RequestState extends Entity
{
    protected $attributes = [
        'id' => null,
        'request_id' => null,
        'state_id' => null
    ];
    protected $datamap = [];
    protected $dates   = [
        'created_at',
        'updated_at'
    ];
    protected $casts   = [];
}
