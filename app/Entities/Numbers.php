<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Numbers extends Entity
{
    protected $attributes = [
        'id' => null,
        'ref' => null,
        'lastnumber' => null
    ];
    protected $datamap = [];
    protected $dates   = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $casts   = [];
}
