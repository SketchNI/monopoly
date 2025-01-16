<?php

namespace App\Http\Controllers;

use App\Events\MessageSentEvent;
use App\Http\Requests\Message\CreateRequest;
use App\Models\Message;
use Illuminate\Http\JsonResponse;

class MessageController extends Controller
{
    public function store(CreateRequest $request): JsonResponse
    {
        $message = new Message();
        $message->user_id = auth()->id();
        if ($request->has('game_id')) {
            $message->game_id = $request->get('game_id');
        }
        $message->message = $request->get('message');
        $message->save();

        MessageSentEvent::dispatch('message', $message->fresh(), auth()->user());

        return response()->json(['type' => 'message', 'content' => $message->fresh(), auth()->user()], 200);
    }
}
