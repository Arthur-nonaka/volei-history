<!DOCTYPE html>
<html>
<head>
    <title>Edit Team</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>Edit Team</h1>

        @if ($errors->any())
            <div class="error-messages">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('teams.update', $team->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $team->name }}" required>
            <br>
            <label for="logo">Logo:</label>
            <input type="file" id="logo" name="logo">
            @if ($team->logo)
                <br>
                <img src="data:image/jpeg;base64,{{ base64_encode($team->logo) }}" alt="{{ $team->name }} logo" width="100">
            @endif
            <br>
            <label for="city">City:</label>
            <input type="text" id="city" name="city" value="{{ $team->city }}" required>
            <br>
            <button type="submit">Update Team</button>
        </form>
    </div>
</body>
</html>