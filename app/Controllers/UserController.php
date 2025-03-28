<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

class UserController extends BaseController {
  
    public function updateuser() {
        return view('updateuser'); // Memanggil view updateuser.php
    }
}
