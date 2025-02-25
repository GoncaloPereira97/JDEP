<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificação de Conta Especial</title>
</head>
<body style="font-family: Arial, sans-serif;">

    <div style="max-width: 80%; max-height: 100%; margin: 0 auto; padding: 20px; background-color: #4b4e6d;">

        <div><img src="{{ asset('images/logo.png') }}" alt="icon" ></div>

        <h2 style="color: white;">{{$request->assunto}}</h2>
        <p style="color: white;">{{$request->mensagem}}</p>
    </div>

</body>
</html>
