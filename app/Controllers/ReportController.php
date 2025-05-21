<?php
namespace App\Controllers;

use App\Models\ReportModel;
use App\Models\NotificationModel;

class ReportController extends BaseController
{
    public function submit()
    {
        $session = session();

        // Pastikan user login
        if (!$session->get('user_id')) {
            return redirect()->back()->with('error', 'Kamu harus login untuk melaporkan.');
        }

        $type = $this->request->getPost('type'); // 'topic' atau 'reply'
        $contentId = $this->request->getPost('id'); // ID dari topik atau balasan
        $reason = $this->request->getPost('reason');

        $reportModel = new ReportModel();

        $reportModel->insert([
            'reporter_id'   => $session->get('user_id'),
            'reported_type' => $type,
            'reported_id'   => $contentId,
            'reason'        => $reason,
        ]);

        // Kirim notifikasi ke admin
        $notifModel = new NotificationModel();
        $adminId = 1; // Ganti dengan user_id admin sesungguhnya

        $message = "Ada laporan baru untuk {$type} dengan ID {$contentId}.";

        $notifModel->insert([
            'user_id'  => $adminId,
            'message'  => $message,
            'is_read'  => 0,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->back()->with('success', 'Laporan telah dikirim.');
    }
}
