<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Payment extends Entity
{
    protected $attributes = [
        'id' => null,
        'request_id' => null,
        'payment_date' => null,
        'payment_type' => null,
        'approvalcode' => null,
        'paymentid' => null,
        'amount' => null,
        'installments' => null

    ];
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
