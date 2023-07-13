<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class RequestItem extends Entity
{
    protected $attributes = [
        'id' => null,
        'request_id' => null,
        'product_id' => null,
        'quantity' => null,
        'unit_price' => null,
        'amount_item' => null,
        'optional' => null
    ];
    protected $datamap = [];
    protected $dates   = [
        'created_at',
        'updated_at',
    ];
    protected $casts   = [];
}
