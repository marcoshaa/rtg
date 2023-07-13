<?php
namespace App\Models;

use CodeIgniter\Model;

class DestinyModel extends Model{

    protected $table = 'destiny';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    //protected $useSoftDeletes = true;
    protected $useTimestamps = true;

    protected $allowedFields = ['id','sigla','name'];

}