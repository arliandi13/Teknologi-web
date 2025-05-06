<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\TopicModel;

class DashboardUser extends BaseController
{
    public function dbuser()
    {
        $topicModel = new TopicModel();
        $userId = session()->get('user_id');
        $q = $this->request->getGet('q');

        // Ambil data postingan milik user saat ini + pencarian jika ada
        $posts = $topicModel->getPostsWithUsers($userId, $q);

        return view('dashboard_user', [
            'title' => 'Dashboard Forum',
            'posts' => $posts,
            'q' => $q,
        ]);
    }
}
