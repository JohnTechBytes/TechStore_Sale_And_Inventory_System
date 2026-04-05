<?php

namespace App\Models;

use CodeIgniter\Model;

class SaleModel extends Model
{
    protected $table = 'sales';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'invoice_no', 'user_id', 'customer_name', 'total_amount',
        'discount', 'tax', 'grand_total', 'payment_method', 'sale_date'
    ];
    protected $useTimestamps = false;

    public function getTodaySales()
    {
        return $this->where('DATE(sale_date)', date('Y-m-d'))->selectSum('grand_total')->first();
    }

    public function getMonthlySales($month = null, $year = null)
    {
        $month = $month ?? date('m');
        $year = $year ?? date('Y');
        return $this->where('MONTH(sale_date)', $month)
                    ->where('YEAR(sale_date)', $year)
                    ->selectSum('grand_total')
                    ->first();
    }
}