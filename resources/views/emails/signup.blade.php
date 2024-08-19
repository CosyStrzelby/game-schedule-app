<p>Hi {{ $player->user->name }},</p>
<p>You are invited to play in a match between {{ $match->team1->name }} and {{ $match->team2->name }} on {{ $match->match_date }}.</p>
<p>Please confirm your participation:</p>
<a href="{{ route('matches.confirm', ['match' => $match->id, 'player' => $player->id, 'response' => 'accept']) }}">I will participate</a>
<a href="{{ route('matches.confirm', ['match' => $match->id, 'player' => $player->id, 'response' => 'decline']) }}">I will not participate</a>
