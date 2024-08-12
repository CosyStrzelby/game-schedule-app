<?php
namespace App\Http\Controllers;
use App\Models\Matches;
use App\Models\Team;
use Illuminate\Http\Request;
class MatchController extends Controller
{
    public function index()
    {
        $matches = Matches::with('team1', 'team2')->get();
        return view('matches.index', compact('matches'));
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
