<?php

namespace App\Models;

use CodeIgniter\Model;

class LogModel extends Model
{
    protected $table = 'activity_logs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'action', 'type'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = false;

    /**
     * Add a new log entry using Query Builder (bypasses model issues)
     */
    public function addLog($action, $type = 'GENERAL')
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        
        return $builder->insert([
            'user_id' => session()->get('user_id') ?? 0,
            'action'  => $action,
            'type'    => $type,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }

    /**
     * Get recent logs with user names
     */
    public function getRecentLogs($limit = 50)
    {
        return $this->select('activity_logs.*, users.name as user_name')
                    ->join('users', 'users.id = activity_logs.user_id', 'left')
                    ->orderBy('activity_logs.created_at', 'DESC')
                    ->limit($limit)
                    ->findAll();
    }

    /**
     * Get logs by type
     */
    public function getLogsByType($type, $limit = 100)
    {
        return $this->where('type', $type)
                    ->orderBy('created_at', 'DESC')
                    ->limit($limit)
                    ->findAll();
    }
}