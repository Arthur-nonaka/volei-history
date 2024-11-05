<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$team->name}}</title>

    <link rel="stylesheet" href="{{ asset('style.css') }}">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
</head>

<body>
    <div class="header">
        <div>
            @if ($team->logo)
                <img src="data:image/jpeg;base64,{{ base64_encode($team->logo) }}" alt="{{ $team->name }} logo" width="100">
            @endif
            <div>
                <h1 class="is-size-3">{{ $team->name }}</h1>
                <p>{{ $team->city }}</p>
            </div>
        </div>
        <div>
            <a style="margin-right: 10px" href="{{route('teams.edit', $team->id)}}">
                <button>
                    Editar
                </button>
            </a>
            <a href="{{ route('teams.index') }}">
                <button>
                    Voltar
                </button>
            </a>
        </div>
    </div>
    <div>

        <h2>Partidas</h2>
        @if ($team->matchesAsTeam1->isEmpty() && $team->matchesAsTeam2->isEmpty())
            <p>Não tem partidas</p>
        @else
            <ul>
                @foreach ($team->matchesAsTeam1 as $match)
                    <li>
                        Partida entre {{ $team->name }} e {{ $match->team2->name }} às {{ $match->date }}
                    </li>
                @endforeach
                @foreach ($team->matchesAsTeam2 as $match)
                    <li>
                        Partida entre {{ $match->team1->name }} e {{ $team->name }} às {{ $match->date }}
                    </li>
                @endforeach
            </ul>
        @endif

        <h2>Jogadores</h2>
        @if ($team->players->isEmpty())
            <p>Não tem jogadores</p>
        @else
            <ul>
                @foreach ($team->players as $player)
                    <li>{{ $player->name }}</li>
                @endforeach
            </ul>
        @endif


        <div class="create-form" id="createFormContainer">
            <button class="toggle-button" onclick="toggleForm()">|||</button>
            <h2>Novo Jogador</h2>
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('teams.players.store', $team->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div>
                    <label for="logo">Foto:</label>
                    <input type="file" id="logo" name="logo">
                </div>
                <button type="submit">Add</button>
            </form>
        </div>

        <div class="create-form" style="transform: translatey(-50px)" id="createFormContainerMatch">
            <button class="toggle-button" onclick="toggleFormMatch()">|||</button>
            <h2>Partida Contra</h2>
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('teams.matches.store', $team->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <select id="team2_id" name="team2_id" required>
                        @foreach ($teams as $teamfor)
                            @if ($teamfor->id != $team->id)
                                <option value="{{ $teamfor->id }}">{{ $teamfor->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="date"> Data </label>
                    <input type="date" id="date" name="date" required>
                </div>
                <button type="submit">Add</button>
            </form>
        </div>
    </div>
</body>

<script>
    function toggleForm() {
        var formContainer = document.getElementById('createFormContainer');
        if (formContainer.classList.contains('open')) {
            formContainer.classList.remove('open');
        } else {
            formContainer.classList.add('open');
        }
    }

    function toggleFormMatch() {
        var formContainer = document.getElementById('createFormContainerMatch');
        if (formContainer.classList.contains('open')) {
            formContainer.classList.remove('open');
        } else {
            formContainer.classList.add('open');
        }
    }
</script>

</html>