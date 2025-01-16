<?php

namespace App\Http\Controllers;

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
    public function create(CreateRequest $request): RedirectResponse
    {
        $user = User::find(auth()->id());
        $user->update(['color' => $request->get('color'), 'token' => $request->get('token')]);

        $game = Game::create([
            'game_id' => $request->get('game_id'),
            'gameable_id' => auth()->id(),
            'gameable_type' => User::class]
        );

        GameUser::create(['game_id' => $game->id, 'user_id' => auth()->id()]);

        $players = GameUser::where('game_id', $game->id)->get();

        return redirect()->route('games.show', ['game' => $game, 'players' => $players]);
    }

    public function update(UpdateRequest $request, Game $game): RedirectResponse
    {
        User::find(auth()->id())->update(['color' => $request->get('color'), 'token' => $request->get('token')]);
    }

    public function show(Game $game): Response
    {
        $game = Game::find($game->id);
        $messages = Message::with('user')->orderByDesc('id')->whereGameId($game->id)->limit(50)->get();

        return inertia('Game', compact('game', 'messages'));
    }
}
