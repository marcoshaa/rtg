<?php

namespace App\Models;

use CodeIgniter\Model;

class RequestPaxModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'request_pax';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['id','request_id','sequence','birth_date','firstname','lastname','genre','document','ppe','pperelationshippax','zipcode','address','address_nro','complement','district','city_id','phone','email','child','ticket_number','ticket_print','status','cancel_date','cancel_user_id','integrated'];

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
