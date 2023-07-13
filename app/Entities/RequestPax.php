<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class RequestPax extends Entity
{
    protected $attributes = [
        'id' => null,
        'request_id' => null,
        'sequence' => null,
        'birth_date' => null,
        'firstname' => null,
        'lastname' => null,
        'genre' => null,
        'document' => null,
        'ppe' => null,
        'pperelationshippax' => null,
        'zipcod' => null,
        'address' => null,
        'address_nro' => null,
        'complement' => null,
        'district' => null,
        'city_id' => null,
        'phone' => null,
        'email' => null,
        'child' => null,
        'ticket_number' => null,
        'ticket_print' => null,
        'status' => null,
        'cancel_date' => null,
        'cancel_user_id' => null,
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
