<?php

namespace App\Models;

use CodeIgniter\Model;

class TravelReasonModel extends Model {

    protected $table = 'travel_reason';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;

    protected $allowedFields = ['id','description'];

}