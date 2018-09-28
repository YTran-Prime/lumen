<?php
namespace App\Repositories\Conversation;
use App\Model\Conversation\Conversation;

use App\Repositories\EloquentRepository;

class ConversationEloquentRepository extends EloquentRepository implements ConversationRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Conversation::class;
    }

    /**
     * Get all posts only published
     * @return mixed
     */
    public function getAll()
    {
        $result = $this->_model->get();

        return $result;
    }

    /**
     * Get post only published
     * @param $id int Post ID
     * @return mixed
     */
    public function findOnly($id)
    {
        $result = $this
            ->_model
            ->where('conversation_id', $id)
            ->first();

        return $result;
    }
}