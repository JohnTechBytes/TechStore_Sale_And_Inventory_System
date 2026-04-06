<?php

namespace App\Models;

use CodeIgniter\Model;

class LogModel extends Model
{
    protected $table = 'activity_logs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'username', 'action', 'type'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = false;

    /**
     * Add a new log entry using Query Builder (bypasses model field restrictions)
     */
    public function addLog($action, $type = 'GENERAL')
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        
        $session = session();
        $userId   = $session->get('user_id') ?? $session->get('userId') ?? 0;
        $username = $session->get('username') ?? $session->get('user_name') ?? 'System';

        return $builder->insert([
            'user_id'    => $userId,
            'username'   => $username,
            'action'     => $action,
            'type'       => $type,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }

    /**
     * Get recent logs – no join needed (username is already stored)
     */
    public function getRecentLogs($limit = 50)
    {
        return $this->orderBy('created_at', 'DESC')
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