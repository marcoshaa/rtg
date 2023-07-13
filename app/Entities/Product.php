<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Product extends Entity
{
    protected $id;
    protected $category_id;
    protected $type_id;
    protected $name;
    protected $code;
    protected $description;
    protected $label;
    protected $agetext;
    protected $text;
    protected $optional;
    
    protected $datamap = [];
    protected $dates   = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $casts   = [];

}
