<?php

namespace App\Models;

use CodeIgniter\Model;

class MessageModel extends Model
{
    protected $table = 'messages';
    protected $primaryKey = 'id';
    protected $allowedFields = ['sender_id', 'receiver_id', 'content', 'created_at'];

    /**
     * Ambil semua pesan antara dua user, dengan join user untuk ambil nama & foto pengirim.
     *
     * @param int $user1 - ID user pertama (biasanya yang login)
     * @param int $user2 - ID user kedua (receiver)
     * @return array
     */
    public function getChatBetween($user1, $user2)
    {
        return $this->select('messages.*, sender.name as sender_name, sender.photo as sender_photo, receiver.name as receiver_name, receiver.photo as receiver_photo')
                    ->join('users as sender', 'sender.id = messages.sender_id')
                    ->join('users as receiver', 'receiver.id = messages.receiver_id')
                    ->where("(sender_id = $user1 AND receiver_id = $user2) OR (sender_id = $user2 AND receiver_id = $user1)")
                    ->orderBy('messages.created_at', 'ASC')
                    ->findAll();
    }

    public function getMessagesWith($userId, $currentUserId)
    {
        return $this->select('messages.*, users.name as sender_name, users.photo as sender_photo')
                    ->join('users', 'users.id = messages.sender_id')
                    ->where("(sender_id = $userId AND receiver_id = $currentUserId) 
                             OR (sender_id = $currentUserId AND receiver_id = $userId)")
                    ->orderBy('created_at', 'ASC')
                    ->findAll();
    }

}
