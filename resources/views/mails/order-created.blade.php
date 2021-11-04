<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje de solicitud de información del sitio web High Tech Bearings</title>
</head>

<body>
    <h5>Nueva venta en el sitio web!</h5>

    <p style="font-size:1.15rem;">
        Mail del comprador: <strong style="font-size:1.25rem;">{{ $buyer->email }} </strong> 
    </p>
    <p style="font-size:1.15rem;">
        Nombre del comprador: <strong style="font-size:1.25rem;">{{ $buyer->name }} </strong> 
    </p>
    <p style="font-size:1.15rem;">
        Monto total de la venta: <strong style="font-size:1.25rem;"> {{ $amount }} </strong> 
    </p>

</body>

</html>