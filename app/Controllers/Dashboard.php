<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends BaseController {
  
    public function views() {

        return view('dashboard'); // Memanggil view updateuser.php
    }
}
