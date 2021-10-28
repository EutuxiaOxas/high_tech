<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje de contacto del sitio web High Tech Bearings</title>
</head>
<body>

    <p>Recibiste un mensaje de: <strong style="font-size:1.25rem;">{{ $mensaje->name }} - {{ $mensaje->email }} </strong> </p>
    <p>Teléfono de contacto: <strong style="font-size:1.25rem;"> {{ $mensaje->phone }} </strong> </p>
    <p> <strong>Mensaje: </strong> </p>
    <p>Recibiste un mensaje de: {{ $mensaje->message }} </p>
    
</body>
</html>