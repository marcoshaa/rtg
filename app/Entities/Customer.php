<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Customer extends Entity
{
    protected $attributes = [
        'id' => null,
        'name' => null,
        'bussinessname' => null,
        'code' => null,
        'type' => null,
        'genre' => null,
        'birthdate' => null,
        'ppe' => null,
        'zipcode' => null,
        'address' => null,
        'address_nro' => null,
        'complement' => null,
        'district' => null,
        'city_id' => null,
        'phone' => null,
        'email' => null,
        'status' => null,
        'balance' => null
    ];
    protected $datamap = [];
    protected $dates   = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $casts   = [];
}
