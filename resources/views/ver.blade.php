<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body class="container">
    <table class="table table-dark table-striped">
        <thead>
            <tr>
              <th scope="col">Entrada</th>
              <th scope="col">fecha</th>
              <th scope="col">Usuario</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($registros as $item)    
                <tr>
                {{-- <td>{{++$cont}}</td> --}}
                <td>{{$item->fecha}}</td>
                <td>{{$item->count}}</td>
                </tr>
            @endforeach
          </tbody>    
    </table>

</body>
</html>