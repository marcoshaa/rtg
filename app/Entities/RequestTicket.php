<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class RequestTicket extends Entity
{
    protected $attributes = [
        'id' => null,
        'request_id' => null,
        'ticket_number' => null,
        'ticket_link' => null
    ];
    protected $datamap = [];
    protected $dates   = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $casts   = [];
}
