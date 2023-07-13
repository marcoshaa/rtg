<?php

namespace App\Models;

use CodeIgniter\Model;
//use Michalsn\Uuid\UuidModel;

class LeadOptionalModel extends Model
{
    protected $table                = 'lead_optional';
    protected $primaryKey           = 'id';
    protected $returnType           = 'App\Entities\LeadOptional';
    //protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['id','lead_id', 'product_id', 'unitprice', 'paxs', 'total'];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

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

