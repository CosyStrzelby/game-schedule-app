<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Matches extends Model
{
    use HasFactory;
    protected $fillable = ['team1_id', 'team2_id', 'match_date'];
    protected $dates = ['match_date'];
    public function team1()
    {
        return $this->belongsTo(Team::class, 'team1_id');
    }
    public function team2()
    {
        return $this->belongsTo(Team::class, 'team2_id');
    }
    public function players()
    {
        return $this->belongsToMany(Player::class);
    }

    public function matches()
    {
        return
            $this->belongsToMany(Matches::class, 'matches_player', 'player_id', 'match_id');
    }
}
