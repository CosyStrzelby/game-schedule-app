<?php

namespace App\Http\Controllers;
use App\Models\Matches;
use App\Models\Team;
use Illuminate\Http\Request;
use Carbon\Carbon;
class MatchController extends Controller
{
public function index()
{
$matches = Matches::all();
$monthYear = now()->format('F Y');
$daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
$numDays = now()->daysInMonth;
$paddingDays = now()->copy()->startOfMonth()->dayOfWeek;
return view('matches.index', compact('matches', 'monthYear', 'daysOfWeek', 'numDays', 'paddingDays'));
}
public function create()
{
$teams = Team::all();
return view('matches.create', compact('teams'));
}
public function store(Request $request)
{
$request->validate([
'team1_id' => 'required|exists:teams,id',
'team2_id' => 'required|exists:teams,id',
'match_date' => 'required|date',
]);
Matches::create([
'team1_id' => $request->team1_id,
'team2_id' => $request->team2_id,
'match_date' => $request->match_date,
]);
return redirect()->route('matches.index')->with('success', 'Match created successfully.');
}
public function destroy($id)
{
$match = Matches::findOrFail($id);
$match->delete();
return redirect()->route('matches.index')->with('success', 'Match deleted successfully.');
}
    public function show(Matches $match)
    {
        return view('matches.show', compact('match'));
    }
    public function edit(Matches $match)
    {
        $teams = Team::all();
        // Konwersja match_date na obiekt DateTime
        $match->match_date = new \DateTime($match->match_date);
        return view('matches.edit', compact('match', 'teams'));
    }
}
