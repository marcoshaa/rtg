<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Type extends Entity
{
    protected $attributes = [
        'id' => null,
        'code' => null,
        'name' => null
    ];
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
