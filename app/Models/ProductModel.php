<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model {

    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $returnType = \App\Entities\Product::class;
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;

    protected $allowedFields = ['id','category_id','type_id','name','code','description','label','text','agetext'];

}