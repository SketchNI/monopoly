<?php

namespace App\Http\Controllers;

use App\Events\JoinedEvent;
use App\Models\Game;
use App\Models\Message;
use Inertia\Response;

class IndexController extends Controller
{
    public function __invoke(): Response
    {
        if (auth()->check()) {
            JoinedEvent::dispatch(auth()->user());

            $messages = Message::with('user')->orderByDesc('id')->whereGameId(null)->limit(50)->get();
            $in_progress_games = Game::whereInProgress(true)->get();

            return inertia('Home', [
                'user' => auth()->user(),
                'messages' => $messages,
                'in_progress_games' => $in_progress_games
            ]);
        }

        return inertia('Index');
    }
}
