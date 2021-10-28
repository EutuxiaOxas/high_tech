<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje de solicitud de información del sitio web High Tech Bearings</title>
</head>
<body>

    <p style="font-size:1.15rem;">Recibiste un mensaje de: <strong style="font-size:1.25rem;">{{ $mensaje->email }} </strong> </p>
    <p style="font-size:1.15rem;">Serie a consultar: <strong style="font-size:1.25rem;"> {{ $mensaje->serie }} </strong> </p>
    <p style="font-size:1.15rem;"> <strong>Mensaje: </strong> </p>
    <p style="font-size:1.15rem;">{{ $mensaje->message }} </p>
    
</body>
</html>