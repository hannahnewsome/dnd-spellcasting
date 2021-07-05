<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME') }}</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">

    <div id="body">

    Character name
    Class & level (deal w/ multiclassing later)

    

    cantrips known
    <form action="/createNewPlayer" method="POST">
    @csrf
        <input type="text" name="charName" id="charName" placeholder="character name">
        <input type="text" name="charAC" id="charAC" placeholder="armor class">
        <input type="text" name="charSpeed" id="charSpeed" placeholder="character speed">
        <input type="text" name="charStr" id="charStr" placeholder="character strength">
        <input type="text" name="charDex" id="charDex" placeholder="character dexterity">
        <input type="text" name="charCon" id="charCon" placeholder="character constitution">
        <input type="text" name="charInt" id="charInt" placeholder="character intelligence">
        <input type="text" name="charWis" id="charWis" placeholder="character wisdom">
        <input type="text" name="charCha" id="charCha" placeholder="character charisma">
        <input type="text" name="charHP" id="charHP" placeholder="character HP">
        <input type="text" name="charLvl" id="charLvl" placeholder="character level">
        <label for="job">Choose a class</label>
        <select name="job" id="job">
        @foreach($options['classes'] as $class)
        <option value="{{ $class }}">{{ $class }}</option>
        @endforeach
        </select>
        <select name="race" id="race">
        @foreach($options['races'] as $race)
        <option value="{{ $race }}">{{ $race }}</option>
        @endforeach
        </select>
        <select name="background" id="background">
        @foreach($options['backgrounds'] as $background)
        <option value="{{ $background }}">{{ $background }}</option>
        @endforeach
        </select>
        <input type="submit">
    </form>
        create new PC
    </div>

        <!-- Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

       <!-- <script src="{{ mix('js/app.js') }}"></script> -->
    </body>
</html>
