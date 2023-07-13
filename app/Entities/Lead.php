<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Lead extends Entity
{
    protected $attributes = [
        'id' => null,
        'destiny' => null,
        'travel_reason' => null,
        'start_date' => null,
        'end_date' => null,
        'nroofdays' => null,
        'paxquote' => null,
        'paxseniorquote' => null,
        'amateur_sports' => null,
        'product_id' => null,
        'exangerate' => null,
        'priceusd' => null,
        'price' => null,
        'price_optional' => null,
        'status' => null
    ];
    
    protected $datamap = [];
    protected $dates   = [
        'created_at',
        'updated_at'
    ];
    protected $casts   = [];
}
