<?php

namespace App\Http\Controllers;
use App\Models\Team;
use Illuminate\Http\Request;
class MainController extends Controller
{
    public function index()
    {
        // Pobranie wszystkich drużyn z przypisanymi zawodnikami
        $teams = Team::with('players.user')->get();
        // Debugowanie - wyświetlenie pobranych danych w logach
        \Log::info($teams);
        // Przekazanie drużyn do widoku
        return view('main.index', compact('teams'));
    }
}
