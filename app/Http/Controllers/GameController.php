<?php

namespace App\Http\Controllers;

use App\Events\JoinedEvent;
use App\Http\Requests\Game\CreateRequest;
use App\Http\Requests\Game\UpdateRequest;
use App\Models\Game;
use App\Models\GameUser;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;

class GameController extends Controller
{
    public function store(CreateRequest $request): RedirectResponse
    {
        $user = User::find(auth()->id());
        $user->update(['color' => $request->get('color'), 'token' => $request->get('token')]);

        $game = Game::create([
            'game_id' => $request->get('game_id'),
            'user_id' => auth()->id(),
            'in_progress' => true,
        ]);

        GameUser::create(['game_id' => $game->id, 'user_id' => auth()->id()]);


        return redirect()->route('games.show', ['user' => $user]);
    }

    public function update(UpdateRequest $request, Game $game): RedirectResponse
    {
        $user = User::find(auth()->id());
        $user->update(['color' => $request->get('color'), 'token' => $request->get('token')]);

        if (!GameUser::where('game_id', $game->id)->where('user_id', auth()->id())->exists()) {
            GameUser::create(['game_id' => $game->id, 'user_id' => auth()->id()]);
        }

        return redirect()->route('games.show', ['game' => $game]);
    }

    public function show(Game $game): Response
    {
        $game = Game::find($game->id);
        $messages = Message::with('user')->orderByDesc('id')->whereGameId($game->game_id)->limit(5)->get();
        $players = GameUser::with('users')->where('game_id', $game->id)->get();
        $user = User::find(auth()->id());

        $in_progress_games = Game::whereInProgress(true)->get();

        JoinedEvent::dispatch($user, sprintf('game.%s', $game->game_id));

        return inertia('Game',
            compact('game', 'messages', 'players', 'user', 'in_progress_games')
        );
    }
}
