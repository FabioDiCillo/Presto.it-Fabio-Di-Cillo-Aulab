<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Presto.it</title>
</head>
<body>
    <div>
        <h1 class="text-center">Un utente ha richiesto di lavorare con noi</h1>
        <h2 class="text-center">Ecco i suoi dati:</h2>
        <p>Nome: {{$user->name}}</p>
        <p>Descrizione: {{$user->email}}</p>
     <p>Se vuoi renderlo revisore clicca qui:</p>
     <button type="button" class="btn btn-warning"><a href="{{route('make.revisor', compact('user'))}}">Rendi Revisore</a></button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>   
</body>
</html>