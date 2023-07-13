<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class LeadOptional extends Entity
{
    protected $attributes = [
        'id' => null,
        'lead_id' => null,
        'product_id' => null,
        'unitprice' => null,
        'paxs' => null,
        'total' => null
    ];

    protected $datamap = [];
    protected $dates   = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $casts   = [];
}
