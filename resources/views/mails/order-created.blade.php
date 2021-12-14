<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva venta en el sitio web High Tech Bearings</title>
</head>

<body>
    <h3 style="font-size:1.25rem;color:#1f8a27;">Nueva venta en el sitio web!</h3>

    <p style="font-size:1.15rem;">
        Mail del comprador: <strong style="font-size:1.25rem;">{{ $buyer->email }} </strong> 
    </p>
    <p style="font-size:1.15rem;">
        Teléfono del comprador: <strong style="font-size:1.25rem;">{{ $buyer->phone }} </strong> 
    </p>
    <p style="font-size:1.15rem;">
        Nombre del comprador: <strong style="font-size:1.25rem;">{{ $buyer->name }} </strong> 
    </p>
    <p style="font-size:1.15rem;">
        Monto total de la venta: <strong style="font-size:1.25rem;"> {{ $amount }} $USD</strong> 
    </p>

    <h5 style="font-size:1.2rem;color:#1f4ab0; margin-top:1.5rem;">Producto comprados:</h5>
    @foreach ($products as $product)
        <div style="font-size:1.15rem;">
            <strong>{{ $product->title }}: </strong> &nbsp &nbsp &nbsp 
            <span> {{ $product->quantity }} x {{ $product->price }}$USD </span>
        </div>
        <hr>
    @endforeach

</body>

</html>