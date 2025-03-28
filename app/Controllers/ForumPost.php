<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class ForumPost extends Controller
{
    public function forum()
    {
        return view('forum'); // Pastikan 'forum' adalah nama file di Views (tanpa .php)
    }
}
