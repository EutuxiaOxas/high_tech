<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago registrado en la web High Tech Bearings</title>
</head>

<body>
    <h3 style="font-size:1.25rem;color:#1f8a27;">Nuevo pago en el sitio web!</h3>

    <p style="font-size:1.15rem;">
        Comprador: <strong style="font-size:1.25rem;">{{ $buyer->name }} - {{ $buyer->email }} - {{ $buyer->phone }}</strong> 
    </p>
    <p style="font-size:1.15rem;">
        Monto del pago: <strong style="font-size:1.25rem;">{{ $amount }} </strong> 
    </p>
    <p style="font-size:1.15rem;">
        Cuenta a la cual se realizo el pago: <strong style="font-size:1.25rem;"> {{ $account->account }} </strong> 
    </p>
    <p style="font-size:1.15rem;">
        Referencia: <strong style="font-size:1.25rem;"> {{ $reference }}</strong> 
    </p>
    <p style="font-size:1.15rem;">
        Observaciones: <strong style="font-size:1.25rem;"> {{ $observations }}</strong> 
    </p>

</body>

</html>