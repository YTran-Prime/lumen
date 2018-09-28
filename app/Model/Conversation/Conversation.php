<?php

namespace App\Model\Conversation;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Conversation extends Eloquent
{
    // Conversation Status
    const OPENING = 1;
    const DIRECT_SKIP = 2;
    const ESCALATE_SKIP = 3;
    const DIRECT_RESPONSE = 4;
    const ESCALATE_RESPONSE = 5;
    const WAITING_ESCALATE = 6;
    const ANSWER_ESCALATE = 7;

    // Conversation Type
    const MESSAGE = 1;
    const COMMENT = 2;
    const REPLY = 3;
    const POST_ON_WALL = 4;

    protected $connection = 'mongodb';

    protected $collection = 'conversation_history';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'conversation_id', 'fb_page_id', 'date', 'type', 'conversation_status'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function status() {
        return $this->hasMany(Status::class, 'conversation_id');
    }
}
