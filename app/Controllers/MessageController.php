<?php

namespace App\Controllers;

use App\Models\MessageModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class MessageController extends BaseController
{
    protected $messageModel;
    protected $userModel;

    public function __construct()
    {
        $this->messageModel = new MessageModel();
        $this->userModel = new UserModel();
    }

    public function users()
    {
        $userId = session()->get('user_id');
        $data['users'] = $this->userModel->where('id !=', $userId)->findAll();

        return view('message/users', $data);
    }

    public function chat($id)
    {
        $messageModel = new \App\Models\MessageModel();
        $userModel = new \App\Models\UserModel(); // ganti dengan model user kamu

        $receiver = $userModel->find($id);
        $users = $userModel
            ->where('id !=', session()->get('user_id')) // tidak tampilkan diri sendiri
            ->findAll();

        $messages = $messageModel->getMessagesWith($id, session()->get('user_id'));

        return view('message/chat', [
            'receiver' => $receiver,
            'messages' => $messages,
            'users' => $users, // <- ini penting
        ]);
    }



    public function sendMessage()
    {
        $senderId = session()->get('user_id');
        $receiverId = $this->request->getPost('receiver_id');
        $content = $this->request->getPost('content');

        $this->messageModel->insert([
            'sender_id' => $senderId,
            'receiver_id' => $receiverId,
            'content' => $content
        ]);

        return redirect()->to('/message/chat/' . $receiverId);
    }

    
}
