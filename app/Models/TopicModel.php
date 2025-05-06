<?php

namespace App\Models;

use CodeIgniter\Model;

class TopicModel extends Model
{
    protected $table = 'topics';
    protected $allowedFields = ['title', 'content', 'user_id', 'attachment', 'created_at', 'category'];

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

}
