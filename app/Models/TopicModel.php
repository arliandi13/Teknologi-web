<?php

namespace App\Models;

use CodeIgniter\Model;

class TopicModel extends Model
{
    protected $table = 'topics';
    protected $allowedFields = ['title', 'content', 'user_id', 'attachment', 'created_at' ,'category'];

}
