<?php
namespace App\Repositories\Conversation;

interface ConversationRepositoryInterface
{
    /**
     * Get all conversations
     * @return mixed
     */
    public function getAll();
}