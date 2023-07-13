<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Insurance extends Entity
{
    protected $attributes = [
        'id' => null,
        'product_id' => null,
        'currency_id' => null,
        'description' => null,
        'value' => null,
        'days' => null
    ];
    protected $datamap = [];
    protected $dates   = [
        'created_at',
        'updated_at'
    ];
    protected $casts   = [];
}
