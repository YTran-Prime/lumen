<?php

namespace App\Model\Conversation;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Status extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'status';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'conversation_id', 'status'
    ];
}
