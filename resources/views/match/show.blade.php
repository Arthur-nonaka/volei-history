<!DOCTYPE html>
<html>
<head>
    <title>Match Players</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Players in this Match</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($players as $player)
                    <tr>
                        <td>{{ $player->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>