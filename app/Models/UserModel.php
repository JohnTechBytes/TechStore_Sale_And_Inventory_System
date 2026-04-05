<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    
    protected $allowedFields = [
        'uuid', 'email', 'password', 'role', 'status', 
        'name', 'phone', 'created_at', 'updated_at', 'deleted_at'
    ];
    
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    
    // CORRECT SYNTAX - array of method names
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];
    
    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }
    
    // Optional UUID generation (remove if not needed)
    // protected $beforeInsert[] = 'generateUuid'; // WRONG - don't use []
    // Instead, add to the array:
    // protected $beforeInsert = ['hashPassword', 'generateUuid'];
    
    protected function generateUuid(array $data)
    {
        if (empty($data['data']['uuid'])) {
            $data['data']['uuid'] = uniqid(); // or use a helper
        }
        return $data;
    }
    
    public function getRecords($start, $length, $searchValue = '')
    {
        $builder = $this->builder();
        $builder->select('*');
        
        if (!empty($searchValue)) {
            $builder->groupStart()
                ->like('email', $searchValue)
                ->orLike('name', $searchValue)
                ->groupEnd();
        }
        
        $filteredBuilder = clone $builder;
        $filteredRecords = $filteredBuilder->countAllResults();
        
        $builder->limit($length, $start);
        $data = $builder->get()->getResultArray();
        
        return ['data' => $data, 'filtered' => $filteredRecords];
    }
    
    public function getByRole($role)
    {
        return $this->where('role', $role)->where('status', 'active')->findAll();
    }
    
    public function emailExists($email, $excludeId = null)
    {
        $builder = $this->where('email', $email);
        if ($excludeId) {
            $builder->where('id !=', $excludeId);
        }
        return $builder->countAllResults() > 0;
    }
}