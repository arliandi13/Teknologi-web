<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function attemptLogin()
    {
        $session = session();
        $userModel = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session->set([
                'user_id'     => $user['id'],
                'user_name'   => $user['name'],
                'user_role'   => $user['role'],
                'photo'       => $user['photo'] ?? session()->get('photo'),
                'is_logged_in'=> true
            ]);

            // Redirect sesuai role
            if ($user['role'] == 'admin') {
                return redirect()->to('/dbadmin');
            } else {
                return redirect()->to('/dbuser');
            }
        } else {
            return redirect()->back()->with('error', 'Email atau password salah.');
        }
    }


    public function attemptRegister()
    {
        $userModel = new UserModel();

        $role = $this->request->getPost('role');

        // Validasi supaya admin tidak bisa daftar sembarangan (opsional, untuk keamanan)
        if (!in_array($role, ['user', 'admin'])) {
            return redirect()->back()->with('error', 'Role tidak valid.');
        }

        $data = [
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => $role
        ];

        $userModel->insert($data);
        return redirect()->to('/login')->with('success', 'Registrasi berhasil.');
    }

    public function logout()
    {
        session()->destroy(); // Hapus semua session
        return redirect()->to('/login'); // Arahkan ke halaman login
    }


}
