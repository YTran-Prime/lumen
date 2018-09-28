<?php
namespace App\Http\Controllers;

use App\Http\Transformers\ConversationTransformer;
use Illuminate\Http\Request;
use App\Repositories\Conversation\ConversationRepositoryInterface;


class ConversationController extends Controller
{
    /**
     * @var ConversationRepositoryInterface
     */
    protected $repository;

    /**
     * ConversationController constructor.
     * @param ConversationRepositoryInterface $repository
     */
    public function __construct(ConversationRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return mixed
     */
    public function getAll() {
        $conversations = $this->repository->getAll();
        return $this->response->collection($conversations, new ConversationTransformer())->setStatusCode(200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request) {
        $data = $request->all();

        $this->validate($request, [
            'conversation_id' => 'required',
            'fb_page_id' => 'required',
            'date' => 'required|date',
            'type' => 'required',
            'status' => 'required',
            'conversation_status' => 'required'
        ]);

        $conversation = $this->repository->create($data);

        return !empty($conversation) ? response()->json([
            'message' => 'Successfully created conversation!'
        ], 201) : null;
    }
}