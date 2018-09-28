<?php
namespace App\Repositories\Dashboard;
use App\Model\Conversation\Conversation;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Carbon;

class DashboardEloquentRepository extends EloquentRepository implements DashboardRepositoryInterface
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
     * @return EloquentRepository[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        $result = $this->_model
            ->whereNotNull('conversation_id');
        return $result;
    }

    /**
     * @param $attributes
     * @return EloquentRepository[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function getAllConversation(array $attributes)
    {
        $result = $this->getAll();
        $result = $this->filterListByParams($result, $attributes);
        $result = $result->groupBy('conversation_id')->get();
        return $result->count();
    }

    /**
     * Get post only published
     * @param $id int Conversation ID
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


    /**
     * @param array $attributes
     * @return mixed
     */
    public function getTotalResponded(array $attributes)
    {
        $result = $this->getAll()
            ->whereIn('conversation_status', [Conversation::DIRECT_RESPONSE, Conversation::ESCALATE_RESPONSE]);
        $result = $this->filterListByParams($result, $attributes);
        $result = $result->groupBy('conversation_id')->get();

        return $result;
    }

    /**
     *
     */
    public function getTotalSkipped(array $attributes)
    {
        $result = $this->getAll()
            ->whereIn('conversation_status', [Conversation::DIRECT_SKIP, Conversation::ESCALATE_SKIP]);
        $result = $this->filterListByParams($result, $attributes);
        $result = $result->groupBy('conversation_id')->get();

        return $result;
    }

    /**
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Collection|mixed
     */
    public function getTotalEscalateCase(array $attributes)
    {
        $result = $this->getAll()
            ->whereIn('conversation_status', [Conversation::ESCALATE_SKIP, Conversation::ESCALATE_RESPONSE, Conversation::WAITING_ESCALATE, Conversation::ANSWER_ESCALATE]);
        $result = $this->filterListByParams($result, $attributes);
        $result = $result->groupBy('conversation_id')->get();

        return $result;
    }

    /**
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Collection|mixed
     */
    public function getTotalComment(array $attributes)
    {
        $result = $this->getAll()
            ->whereIn('type', [Conversation::COMMENT, Conversation::REPLY]);
        $result = $this->filterListByParams($result, $attributes);
        $result = $result->groupBy('conversation_id')->get();

        return $result;
    }

    /**
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Collection|mixed
     */
    public function getTotalMessage(array $attributes)
    {
        $result = $this->getAll()
            ->where('type', Conversation::MESSAGE);
        $result = $this->filterListByParams($result, $attributes);
        $result = $result->groupBy('conversation_id')->get();

        return $result;
    }

    /**
     * @param array $attributes
     * @return EloquentRepository[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function ConversationSummary(array $attributes)
    {
        $result = $this->getAll();
        $result = $this->filterListByParams($result, $attributes);
        return $result->get();
    }
//
//    public function Sentiment()
//    {
//
//    }
//
//    public function AvgWaitingTime()
//    {
//
//    }
//
//    public function AvgProcessingTime()
//    {
//
//    }
//
//    public function DataTag()
//    {
//
//    }
//
//    public function TheRisingIssues()
//    {
//
//    }

    /**
     * @param $conversations
     * @param $params
     * @return mixed
     */
    private function filterListByParams($conversations, $params)
    {
        $conversations->where('fb_page_id', $params['fb_page_id']);

        if (!empty($params['start_date']) && !empty($params['end_date'])) {
            $conversations->whereDate('date', '>=', $params['start_date']);
            $conversations->whereDate('date', '<=', $params['end_date']);
        }

        return $conversations;
    }
}