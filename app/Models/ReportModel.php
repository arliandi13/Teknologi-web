<?php
namespace App\Models;

use CodeIgniter\Model;

class ReportModel extends Model
{
    protected $table = 'reports';
    protected $primaryKey = 'id';
    protected $allowedFields = ['reporter_id', 'reported_type', 'reported_id', 'reason', 'status', 'created_at'];
    protected $useTimestamps = false;


    public function getPendingReports()
    {
        return $this->where('status', 'pending')->findAll();
    }

    public function countPending()
    {
        return $this->where('status', 'pending')->countAllResults();
    }

}
