<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Inicio</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('ver')}}">Asistencias</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('inasistencias')}}">Inasistencias</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('entradas-salidas')}}">Entradas y salidas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('temperatura-voltaje')}}">Voltaje</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('carga-temp')}}">Temperatura</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <h1>Inicio</h1>
</body>
</html>