<?php

namespace App\Models;

use CodeIgniter\Model;

class RequestModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'request';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['id','customer_id','currency_id','request_number','request_date','travel_reason_id','origin','destiny_id','amateur_sports','start_date','end_date','nroofdays','paxs','paxsenior','amount','installments','payment_type','user_id','lead_id','status','emailemergency','phoneemergency','contactemergency','ticket_number','is_group','integrated'];

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
