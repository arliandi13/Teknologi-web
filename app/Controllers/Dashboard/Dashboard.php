<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController; // <- ini benar
use CodeIgniter\Controller; // ini sebenarnya gak dipakai di sini, boleh dihapus

class Dashboard extends BaseController
{
    public function dbadmin()
    {
        return view('dashboard'); // atau ganti sesuai nama view
    }
}
