<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Dashboard\DashboardRepositoryInterface;


class DashboardController extends Controller
{
    /**
     * @var DashboardRepositoryInterface
     */
    protected $repository;

    /**
     * DashboardController constructor.
     * @param DashboardRepositoryInterface $repository
     */
    public function __construct(DashboardRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getConversation(Request $request) {
        $params = $request->all();
        $conversations = $this->repository->getAllConversation($params);
        return $conversations;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getResponded(Request $request) {
        $params = $request->all();
        $responders = $this->repository->getTotalResponded($params);
        return $responders;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getSkip(Request $request) {
        $params = $request->all();
        $skips = $this->repository->getTotalSkipped($params);
        return $skips;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getEscalate(Request $request) {
        $params = $request->all();
        $escalates = $this->repository->getTotalEscalateCase($params);
        return $escalates;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getComment(Request $request) {
        $params = $request->all();
        $comments = $this->repository->getTotalComment($params);
        return $comments;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getMessage(Request $request) {
        $params = $request->all();
        $messages = $this->repository->getTotalMessage($params);
        return $messages;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getConversationSummary(Request $request){
        $params = $request->all();
        $conversationSummary = $this->repository->ConversationSummary($params);
        return $conversationSummary;
    }

}