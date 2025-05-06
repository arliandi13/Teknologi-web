<?php

namespace App\Models;

use CodeIgniter\Model;

    class ReplyModel extends Model{

        protected $table      = 'replies';
        protected $primaryKey = 'id';

        protected $useAutoIncrement = true;
        protected $allowedFields = ['topic_id', 'user_id', 'content', 'attachment', 'created_at'];

        protected $returnType     = 'array';
        public $timestamps = false;

        public function getRepliesWithUsers($topic_id)
        {
        return $this->select('replies.*, users.name')
                    ->join('users', 'users.id = replies.user_id')
                    ->where('topic_id', $topic_id)
                    ->orderBy('replies.created_at', 'ASC')
                    ->findAll();
        }

        

}
