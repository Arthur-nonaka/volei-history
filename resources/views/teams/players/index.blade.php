<!DOCTYPE html>
<html>
<head>
    <title>Players</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>Players for Team: {{ $team->name }}</h1>
        <ul>
            @foreach ($players as $player)
                <li>{{ $player->name }}</li>
            @endforeach
        </ul>
        <a href="{{ route('teams.show', $team->id) }}">Back to Team</a>
    </div>
</body>
</html>