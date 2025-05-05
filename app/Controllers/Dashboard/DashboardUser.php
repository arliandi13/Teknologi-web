<?php

namespace App\Controllers;
namespace App\Controllers\Dashboard;

use CodeIgniter\Controller;

class DashboardUser extends Controller
{
    public function dbuser()
    {
        return view('dashboard_user'); // Pastikan 'forum' adalah nama file di Views (tanpa .php)
    }
}
