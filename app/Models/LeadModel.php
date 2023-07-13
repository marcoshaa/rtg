<?php

namespace App\Models;

use CodeIgniter\Model;
//use Michalsn\Uuid\UuidModel;

class LeadModel extends Model
{
    protected $table                = 'lead';
    protected $primaryKey           = 'id';
    protected $returnType           = 'App\Entities\Lead';
    //protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['id','destiny', 'travel_reason', 'start_date', 'end_date', 'nroofdays','paxquote', 'paxseniorquote', 'amateur_sports', 'product_id', 'exangerate','priceusd', 'price','price_optional', 'status'];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];

}
