<?php

namespace App\Models;

use CodeIgniter\Model;

class PinModel extends Model
{
    protected $table      = 'pins';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'board_id', 'image_url', 'source_url', 
        'title', 'category', 'tags', 'products'
    ];
    protected $useTimestamps = false;
}