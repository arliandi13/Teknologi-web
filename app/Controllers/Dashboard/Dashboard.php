<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController; // <- ini benar
use CodeIgniter\Controller; // ini sebenarnya gak dipakai di sini, boleh dihapus
use App\Models\TopicModel;

class Dashboard extends BaseController
{
    public function dbadmin()
    {
        $topicModel = new TopicModel();

        $session = session();
    
        // Cek apakah sudah login dan role admin
        if (!$session->get('is_logged_in') || $session->get('user_role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'Akses ditolak.');
        }

        // Pie Chart
        $kategoriRaw = $topicModel->getTopicCountByCategory();
        $kategoriForum = [];
        foreach ($kategoriRaw as $row) {
            $kategoriForum[$row['category']] = (int)$row['total'];
        }

        $harianRaw = $topicModel->getTopicCountPerDay(); // tampilkan semua data
        $forumHarian = [];
        foreach ($harianRaw as $row) {
            $forumHarian[$row['date']] = (int)$row['total'];
        }
        

        return view('dashboard', [
            'kategoriForum' => $kategoriForum,
            'forumHarian'   => $forumHarian
        ]);
    }
}
