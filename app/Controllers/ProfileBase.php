<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class ProfileBase extends Controller
{

    public function profile() // Tambahkan ini jika ingin akses /profilebase/profile
    {
        return view('profile');
    }
}
