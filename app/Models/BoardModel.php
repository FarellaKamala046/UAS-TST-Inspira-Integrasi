<?php

namespace App\Models;

use CodeIgniter\Model;

class BoardModel extends Model
{
    protected $table      = 'boards';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'description', 'visibility'];
    protected $useTimestamps = false; // Memastikan CI4 tidak mencari kolom created_at
}