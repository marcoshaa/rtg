<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class ProductDetail extends Entity
{
    protected $attributes = [
        'id'=>null,
        'product_id'=>null,
        'description'=>null
    ];
    protected $datamap = [];
    protected $dates   = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $casts   = [];
}
