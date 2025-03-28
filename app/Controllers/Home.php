<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends Controller
{
    public function index()
    {
        return view('index'); // Mengarahkan ke file app/Views/index.php
    }
}
