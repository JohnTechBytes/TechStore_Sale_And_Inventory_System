<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name', 'sku', 'category_id', 'buying_price', 'selling_price',
        'stock', 'min_stock', 'image', 'status'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getProductsWithCategory()
    {
        return $this->select('products.*, categories.name as category_name')
                    ->join('categories', 'categories.id = products.category_id', 'left')
                    ->findAll();
    }

    public function getLowStock()
    {
        return $this->where('stock <= min_stock')->where('status', 'active')->findAll();
    }

    public function updateStock($productId, $quantity, $type = 'subtract')
    {
        $product = $this->find($productId);
        if (!$product) return false;
        
        $newStock = ($type == 'add') ? $product['stock'] + $quantity : $product['stock'] - $quantity;
        return $this->update($productId, ['stock' => $newStock]);
    }
}