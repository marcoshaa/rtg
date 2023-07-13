<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class CustomerConfig extends Entity
{
    protected $attributes = [
        'id' => null,
        'customer_id' => null,
        'valid_initial' => null,
        'credit_line' => null,
        'commission_default' => null
    ];
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
