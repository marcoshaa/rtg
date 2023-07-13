<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Configuration extends Entity
{
    protected $attributes = [
        'id' => null,
        'commission_nest' => null
    ];
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
