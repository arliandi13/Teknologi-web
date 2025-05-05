<?php

namespace App\Controllers;

use App\Models\TopicModel;
use App\Models\ReplyModel;

class Forum extends BaseController
{
    protected $topicModel;
    protected $replyModel;

    public function __construct()
    {
        $this->topicModel = new TopicModel();
        $this->replyModel = new ReplyModel();
    }

    public function index()
    {
        helper('textlimit');
        $data['topics'] = $this->topicModel->orderBy('created_at', 'DESC')->findAll();
        return view('forum/index', $data);
    }

    public function create()
    {
        return view('forum/create');
    }

    public function store()
    {
    $files = $this->request->getFiles()['attachments'];
    $fileNames = [];

    if ($files) {
        foreach ($files as $file) {
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move('uploads', $newName);
                $fileNames[] = $newName;
            }
        }
    }

    $this->topicModel->insert([
        'title'      => $this->request->getPost('title'),
        'content'    => $this->request->getPost('content'),
        'user_id'    => session()->get('user_id'),
        'category'   => $this->request->getPost('category'),
        'attachment' => json_encode($fileNames), // ← simpan array jadi string
        'created_at' => date('Y-m-d H:i:s')
    ]);


        return redirect()->to('/forum');
    }

    
    public function detail($id)
    {
        $data['topic'] = $this->topicModel->find($id);
        $data['replies'] = $this->replyModel->getRepliesWithUsers($id);
        return view('forum/detail', $data);
    }

    public function reply($topic_id)
    {
        $replyModel = new \App\Models\ReplyModel();

    $files = $this->request->getFiles()['attachments'];
    $fileNames = [];

    if ($files) {
        foreach ($files as $file) {
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move('uploads', $newName);
                $fileNames[] = $newName;
            }
        }
    }

    $this->replyModel->insert([
        'topic_id'   => $topic_id,
        'user_id'    => session()->get('user_id'),
        'content'    => $this->request->getPost('content'),
        'attachment' => json_encode($fileNames), // ← simpan json
        'created_at' => date('Y-m-d H:i:s')
    ]);

        return redirect()->to("/forum/detail/" . $topic_id);
    }

}

