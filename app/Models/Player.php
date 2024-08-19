<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Player extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'team_id', 'role'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
    public function players()
    {
        return
        $this->belongsToMany(Player::class, 'matches_player', 'match_id', 'player_id');
    }
}
