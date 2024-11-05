<!DOCTYPE html>
<html>
<head>
    <title>Player Details</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>Player: {{ $player->name }}</h1>
        <p>Team: {{ $team->name }}</p>
        <a href="{{ route('teams.players.index', $team->id) }}">Back to Players</a>
    </div>
</body>
</html>