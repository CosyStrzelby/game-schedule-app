<?php

namespace App\Http\Controllers;
use App\Models\Player;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::with('user', 'team')->get();
        return view('players.index', compact('players'));
    }
    public function create()
    {
        $users = User::all();
        $teams = Team::all();
        return view('players.create', compact('users', 'teams'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'team_id' => 'required|exists:teams,id',
            'role' => 'required|in:reserve,starter',
        ]);
        Player::create($request->all());
        return redirect()->route('players.index');
    }
    public function show(Player $player)
    {
        return view('players.show', compact('player'));
    }
    public function edit($id)
    {
        $player = Player::findOrFail($id);
        $users = User::all();
        $teams = Team::all();
        return view('players.edit', compact('player', 'users', 'teams'));
    }
    // Metoda aktualizacji gracza
    public function update(Request $request, Player $player)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'team_id' => 'required|exists:teams,id',
            'role' => 'required|in:reserve,starter',
        ]);
        $player->update($request->only(['user_id', 'team_id', 'role']));
        return redirect()->route('players.index')->with('success', 'Player updated successfully');
    }
    // Metoda dodania nowej roli do gracza
    public function addRole(Request $request, Player $player)
    {
        $request->validate([
            'new_team_id' => 'required|exists:teams,id',
            'new_role' => 'required|in:reserve,starter',
        ]);
        // Dodanie logowania
        \Log::info('Request data:', $request->all());
        Player::create([
            'user_id' => $request->input('user_id'),
            'team_id' => $request->input('new_team_id'),
            'role' => $request->input('new_role'),
        ]);
        return redirect()->route('players.index')->with('success', 'Player added to new team successfully');
    }
    public function destroy(Player $player)
    {
        $player->delete();
        return redirect()->route('players.index');
    }
}
