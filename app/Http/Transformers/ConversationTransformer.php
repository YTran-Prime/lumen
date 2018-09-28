<?php

namespace App\Http\Transformers;

use App\Conversation;
use League\Fractal\TransformerAbstract;

class ConversationTransformer extends TransformerAbstract
{
    public function transform(Conversation $conversation)
    {
        return [
            'id' => (int) $conversation->id,
            'fb_page_id' => $conversation->fb_page_id,
            'date' => $conversation->date,
            'type' => (int) $conversation->type,
            'status' => (int) $conversation->status,
            'conversation_status' => (int) $conversation->conversation_status
        ];
    }
}