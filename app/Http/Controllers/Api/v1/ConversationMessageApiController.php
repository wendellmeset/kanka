<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Conversation;
use App\Models\Campaign;
use App\Models\ConversationMessage;
use App\Http\Requests\StoreConversationMessage as RequestMessage;
use App\Http\Resources\ConversationMessageResource as Resource;

class ConversationMessageApiController extends ApiController
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Campaign $campaign, Conversation $conversation)
    {
        $this->authorize('access', $campaign);
        $this->authorize('view', $conversation);
        return Resource::collection(
            $conversation
                ->messages()
                ->lastSync(request()->get('lastSync'))
                ->paginate()
        );
    }

    /**
     * @return Resource
     */
    public function show(
        Campaign $campaign,
        Conversation $conversation,
        ConversationMessage $conversationMessage
    ) {
        $this->authorize('access', $campaign);
        $this->authorize('view', $conversation);
        return new Resource($conversationMessage);
    }

    /**
     * @return Resource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(RequestMessage $requestMessage, Campaign $campaign, Conversation $conversation)
    {
        $this->authorize('access', $campaign);
        $this->authorize('update', $conversation);
        $model = ConversationMessage::create($requestMessage->all());
        return new Resource($model);
    }

    /**
     * @return Resource
     */
    public function update(
        RequestMessage $requestMessage,
        Campaign $campaign,
        Conversation $conversation,
        ConversationMessage $conversationMessage
    ) {
        $this->authorize('access', $campaign);
        $this->authorize('update', $conversation);
        $conversationMessage->update($requestMessage->all());

        return new Resource($conversationMessage);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(
        \Illuminate\Http\Request $request,
        Campaign $campaign,
        Conversation $conversation,
        ConversationMessage $conversationMessage
    ) {
        $this->authorize('access', $campaign);
        $this->authorize('update', $conversation);
        $conversationMessage->delete();

        return response()->json(null, 204);
    }
}
