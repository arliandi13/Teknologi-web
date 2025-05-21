<?php
namespace App\Controllers;
use App\Models\ReportModel;

class AdminController extends BaseController
{
    public function reports()
    {
        $reportModel = new ReportModel();
        $reports = $reportModel->orderBy('created_at', 'DESC')->findAll();

        return view('admin/reports', ['reports' => $reports]);
    }

    public function updateReportStatus()
    {
        $id = $this->request->getPost('id');
        $status = $this->request->getPost('status');

        $reportModel = new ReportModel();
        $reportModel->update($id, ['status' => $status]);

        return redirect()->to('/admin/reports')->with('message', 'Status laporan diperbarui.');
    }
}
