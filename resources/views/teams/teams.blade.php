<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Times</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
</head>

<body>
    <h1>Times</h1>
    <ul>
        @foreach ($teams as $team)
            <li><a href="{{ route("teams.show", $team->id)}}">{{ $team->name }}</a> - {{ $team->city }}
                @if ($team->logo)
                    <br>
                    <img src="data:image/jpeg;base64,{{ base64_encode($team->logo) }}" alt="{{ $team->name }} logo" width="100">
                @endif
                <form action="{{ route('teams.destroy', $team->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        onclick="return confirm('Are you sure you want to delete this team?')">Delete</button>
                </form>
        @endforeach
        </li>
    </ul>


    <div class="create-form" id="createFormContainer">
        <button class="toggle-button" onclick="toggleForm()">|||</button>
        <h2>Novo Time</h2>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="logo">Foto:</label>
                <input type="file" id="logo" name="logo">
            </div>
            <div>
                <label for="city">City:</label>
                <input type="text" id="city" name="city" required>
            </div>
            <button type="submit">Add</button>
        </form>
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
</script>

</html>