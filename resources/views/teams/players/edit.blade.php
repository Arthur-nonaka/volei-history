<!DOCTYPE html>
<html>
<head>
    <title>Edit Player</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>Edit Player: {{ $player->name }}</h1>
        <form action="{{ route('teams.players.update', [$team->id, $player->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $player->name }}" required>
            <br>
            <button type="submit">Update Player</button>
        </form>
        <a href="{{ route('teams.players.index', $team->id) }}">Back to Players</a>
    </div>
</body>
</html>