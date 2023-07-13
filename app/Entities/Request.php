<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Request extends Entity
{
    protected $attributes = [
        'id' => null,
        'customer_id' => null,
        'currency_id' => null,
        'request_number' => null,
        'request_date' => null,
        'travel_reason_id' => null,
        'origin' => null,
        'destiny_id' => null,
        'start_date' => null,
        'end_date' => null,
        'paxs' => null,
        'paxsenior' => null,
        'amount' => null,
        'installments' => null,
        'payment_type' => null,
        'user_id' => null,
        'lead_id' => null,
        'status' => null,
        'amateur_sports' => null,
        'nroofdays' => null,
        'emailemergency' => null,
        'phoneemergency' => null,
        'contactemergency' => null,
        'ticket_number' => null,
        'is_group' => null,
        'integrated' => null
    ];
    protected $datamap = [];
    protected $dates   = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $casts   = [];
}
