<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje de contacto del sitio web High Tech Bearings</title>
</head>
<body>

    <p>Recibiste un mensaje de: {{ $mensaje->name }} - {{ $mensaje->email }} </p>
    <p>Telefono de contacto: {{ $mensaje->phone }} </p>
    <br>
    <p> <strong>Mensaje: </strong> </p>
    <p>Recibiste un mensaje de: {{ $mensaje->message }} </p>
    
</body>
</html>