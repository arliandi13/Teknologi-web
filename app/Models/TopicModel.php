<?php

namespace App\Models;

use CodeIgniter\Model;

class TopicModel extends Model
{
    protected $table = 'topics';
    protected $allowedFields = ['title', 'content', 'user_id', 'attachment', 'created_at', 'category'];

    // Mendapatkan daftar topik dengan data pengguna dan jumlah komentar
    public function getPostsWithUsers($userId = null, $keyword = null)
    {
        $builder = $this->db->table('topics');
        $builder->select('topics.*, users.name as username, COUNT(replies.id) as comment_count');
        $builder->join('users', 'users.id = topics.user_id');
        $builder->join('replies', 'replies.topic_id = topics.id', 'left');
        $builder->groupBy('topics.id');
        $builder->orderBy('topics.created_at', 'DESC');

        if ($userId !== null) {
            $builder->where('topics.user_id', $userId);
        }

        if ($keyword) {
            $builder->like('topics.title', $keyword);
        }

        return $builder->get()->getResultArray();
    }

    // Statistik: jumlah topik per kategori (untuk diagram lingkaran)
    public function getTopicCountByCategory()
    {
        return $this->select('category, COUNT(*) as total')
                    ->groupBy('category')
                    ->orderBy('total', 'DESC')
                    ->findAll();
    }

    // Statistik: jumlah topik yang dibuat per hari (untuk diagram garis)
    public function getTopicCountPerDay()
    {
        return $this->select("DATE(created_at) as date, COUNT(*) as total")
                    ->groupBy("DATE(created_at)")
                    ->orderBy("DATE(created_at)", "ASC")
                    ->findAll();
    }
    
}
