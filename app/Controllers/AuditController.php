<?php

namespace App\Controllers;

use App\Models\LogModel;

class AuditController extends BaseController
{
    protected $logModel;

    public function __construct()
    {
        $this->logModel = new LogModel();

        // Only admin can view activity logs
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }
    }

    public function index()
    {
        // Use the model's method to get logs with user names
        $logs = $this->logModel->getRecentLogs(200);

        $data = [
            'title' => 'Activity Logs',
            'logs'  => $logs,
        ];

        return view('audit/index', $data);
    }
}