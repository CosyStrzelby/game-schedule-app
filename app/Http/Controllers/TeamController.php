<?php

namespace App\Http\Controllers;
use App\Models\Team;
use Illuminate\Http\Request;
class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('teams.index', compact('teams'));
    }
    public function create()
    {
        return view('teams.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        Team::create($request->all());
        return redirect()->route('teams.index');
    }
    public function show(Team $team)
    {
        $starters = $team->players()->where('role', 'starter')->get();
        $reserves = $team->players()->where('role', 'reserve')->get();
        return view('teams.show', compact('team', 'starters', 'reserves'));
    }
    public function edit(Team $team)
    {
        return view('teams.edit', compact('team'));
    }
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $team->update($request->all());
        return redirect()->route('teams.index');
    }
    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('teams.index');
    }
}
