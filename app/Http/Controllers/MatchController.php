<?php

namespace App\Http\Controllers;
use App\Models\Matches;
use App\Models\Team;
use App\Models\Player;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\MatchInvitation;
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
    public function store(Request $request)
    {
        $request->validate([
            'team1_id' => 'required|exists:teams,id',
            'team2_id' => 'required|exists:teams,id',
            'match_date' => 'required|date',
        ]);
        $match = Matches::create([
            'team1_id' => $request->team1_id,
            'team2_id' => $request->team2_id,
            'match_date' => $request->match_date,
        ]);
        // Pobierz zespoły
        $team1 = Team::find($request->team1_id);
        $team2 = Team::find($request->team2_id);
        // Wyślij zaproszenia do zawodników
        $this->sendInvitations($match, $team1);
        $this->sendInvitations($match, $team2);
        return redirect()->route('matches.index')->with('success', 'Match created successfully.');
    }
    protected function sendInvitations($match, $team)
    {
        // Pobierz wszystkich zawodników "starter" z zespołu
        $starters = $team->players()->where('role', 'starter')->get();
        foreach ($starters as $player) {
            // Wyślij zaproszenie e-mail do każdego zawodnika
            Mail::to($player->user->email)->send(new MatchInvitation($match, $player));
        }
    }


    public function confirmParticipation(Matches $match, Player $player, $response)
    {
        if ($response === 'accept') {
            $match->players()->attach($player->id);
        } elseif ($response === 'decline') {
            $match->players()->detach($player->id);
        }
        return redirect()->route('matches.show', $match)->with('success', 'Participation updated successfully.');
    }
public function create()
{
$teams = Team::all();
return view('matches.create', compact('teams'));
}
public function hold(Request $request)
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
