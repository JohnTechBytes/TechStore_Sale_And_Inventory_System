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
    // app/Models/SaleItemModel.php

public function getTopProducts($year, $month, $limit = 10)
{
    return $this->select('products.id, products.name, products.sku, SUM(sale_items.quantity) as total_quantity, SUM(sale_items.total_price) as total_revenue')
                ->join('products', 'products.id = sale_items.product_id')
                ->join('sales', 'sales.id = sale_items.sale_id')
                ->where('YEAR(sales.sale_date)', $year)
                ->where('MONTH(sales.sale_date)', $month)
                ->groupBy('sale_items.product_id')
                ->orderBy('total_quantity', 'DESC')
                ->limit($limit)
                ->find();
}
}