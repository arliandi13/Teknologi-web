<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

// Tambahkan model yang dibutuhkan
use App\Models\ReportModel;
use App\Models\ReplyModel;

abstract class BaseController extends Controller
{
    protected $request;
    protected $helpers = [];

    protected $reportModel;
    protected $replyModel;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        // Inisialisasi session
        $session = session();

        // Jalankan hanya jika user adalah admin
        if ($session->get('role') === 'admin') {
            $this->reportModel = new ReportModel();
            $this->replyModel  = new ReplyModel();

            // Ambil semua laporan pending
            $pendingReports = $this->reportModel
                                   ->where('status', 'pending')
                                   ->orderBy('id', 'DESC')
                                   ->findAll();

            // Tambahkan topic_id jika report adalah reply
            foreach ($pendingReports as &$report) {
                if ($report['reported_type'] === 'reply') {
                    $reply = $this->replyModel->find($report['reported_id']);
                    $report['topic_id'] = $reply['topic_id'] ?? null;
                }
            }

            $reportCount = count($pendingReports);

            // Kirim data global ke semua view
            view()->setVar('adminReports', $pendingReports);
            view()->setVar('reportCount', $reportCount);
        }
    }
}
