<?php

namespace App\Http\Controllers;
use App\Models\Team;
use Illuminate\Http\Request;
class DashboardController extends Controller
{
public function index()
{
$teams = Team::with('players.user')->get();
return view('dashboard', compact('teams'));
}
}
