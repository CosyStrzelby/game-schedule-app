<?php
namespace App\Http\Controllers;
use App\Models\Matches;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Services\Calendar;
class MatchController extends Controller
{
    public function index()
    {
        $matches = Matches::with(['team1', 'team2'])->get();
        $events = [];
        foreach ($matches as $match) {
            $events[] = (object) [
                'name' => "{$match->team1->name} vs {$match->team2->name}",
                'date' => $match->match_date,
            ];
        }
        $currentYear = date('Y');
        $currentMonth = date('m');
        $monthYear = date('F Y');
        $numDays = date('t');
        $paddingDays = date('w', strtotime("{$currentYear}-{$currentMonth}-01"));
        $paddingEndDays = 42 - ($paddingDays + $numDays);
        $daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        return view('matches.index', compact('events', 'currentYear', 'currentMonth', 'monthYear', 'numDays', 'paddingDays', 'paddingEndDays', 'daysOfWeek'));
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
            'team2_id' => 'required|exists:teams,id|different:team1_id',
            'match_date' => 'required|date',
        ]);
        Matches::create($request->all());
        return redirect()->route('matches.index');
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
    public function update(Request $request, Matches $match)
    {
        $request->validate([
            'team1_id' => 'required|exists:teams,id',
            'team2_id' => 'required|exists:teams,id|different:team1_id',
            'match_date' => 'required|date',
        ]);
        $match->update($request->all());
        return redirect()->route('matches.index');
    }
    public function destroy(Matches $match)
    {
        $match->delete();
        return redirect()->route('matches.index');
    }
}
