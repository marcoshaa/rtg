<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerConfigModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'customer_config';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = \App\Entities\CustomerConfig::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id','customer_id','valid_initial','credit_line','commission_default'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = ['commission_default' => 'required','credit_line' => 'required'];
    protected $validationMessages   = [
        'commission_default' => ['required' => 'Informe o valor da comissão'],
        'credit_line' => ['required' => 'Informe o valor do limite de crédito']
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
