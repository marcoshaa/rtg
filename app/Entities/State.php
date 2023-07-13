<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class State extends Entity
{
    protected $attributes = [
        'id' => null,
        'name' => null,
        'code' => null,
        'id_pais' => null
    ];
    protected $datamap = [];
    protected $dates   = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $casts   = [];
}
