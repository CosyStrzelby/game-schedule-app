<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Notification extends Model
{
    use HasFactory;
    protected $fillable = ['match_id', 'player_id', 'status', 'content'];
    public function matches()
    {
        return $this->belongsTo(Matches::class);
    }
    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
