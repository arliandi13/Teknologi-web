<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserProfileController extends BaseController
{
    public function edit()
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');

        $user = $userModel->find($userId);
        if (!$user) {
            return redirect()->to('/')->with('error', 'Data user tidak ditemukan');
        }

        return view('edit_profile', ['user' => $user]);
    }

    public function update()
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');

        $user = $userModel->find($userId);
        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name'      => 'required|min_length[3]|max_length[255]',
            'email'     => 'required|valid_email',
            'bio'       => 'permit_empty|max_length[500]',
            'specialty' => 'permit_empty|max_length[255]',
            'experience'=> 'permit_empty|max_length[255]',
            'photo'     => 'permit_empty|is_image[photo]',
        ]);

        if (!$validation->run($this->request->getPost())) {
            return redirect()->back()->with('error', $validation->getErrors())->withInput();
        }

        // Ambil data form
        $data = $this->request->getPost([
            'name', 'email', 'bio', 'specialty', 'experience'
        ]);

        // Upload foto jika ada
        $photo = $this->request->getFile('photo');
        if ($photo && $photo->isValid() && !$photo->hasMoved()) {
            $newName = $photo->getRandomName();
            $photo->move('uploads/users/', $newName);
            $data['photo'] = $newName;

            if (!empty($user['photo']) && file_exists('uploads/users/' . $user['photo'])) {
                unlink('uploads/users/' . $user['photo']);
            }
        }

        // Update database
        $userModel->update($userId, $data);

        // Update session
        session()->set([
            'user_name'   => $data['name'],
            'email'       => $data['email'],
            'bio'         => $data['bio'],
            'specialty'   => $data['specialty'],
            'experience'  => $data['experience'],
            'photo'       => $data['photo'] ?? session()->get('photo'),
        ]);

        // Redirect sesuai role
        if ($user['role'] === 'admin') {
            return redirect()->to('/dbadmin')->with('success', 'Profil berhasil diperbarui.');
        } else {
            return redirect()->to('/dbuser')->with('success', 'Profil berhasil diperbarui.');
        }
    }
}
