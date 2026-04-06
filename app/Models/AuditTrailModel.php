<?php

namespace App\Models;

use CodeIgniter\Model;

class AuditTrailModel extends Model
{
    protected $table = 'audit_trails';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'action', 'description', 'ip_address', 'user_agent', 'type'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = false;

    public function getRecentLogs($limit = 20)
    {
        return $this->select('audit_trails.*, users.full_name as user_name')
                    ->join('users', 'users.id = audit_trails.user_id', 'left')
                    ->orderBy('created_at', 'DESC')
                    ->limit($limit)
                    ->findAll();
    }
}