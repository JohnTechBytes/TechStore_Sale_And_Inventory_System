<?php

namespace App\Models;

use CodeIgniter\Model;

class StockMovementModel extends Model
{
    protected $table = 'stock_movements';
    protected $primaryKey = 'id';
    protected $allowedFields = ['product_id', 'quantity', 'type', 'reference', 'user_id'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
}