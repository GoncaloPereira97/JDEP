<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificação de Email</title>

</head>

<body style="font-family: Arial, sans-serif;">

    <div style="max-width: 80%; max-height: 100%; margin: 0 auto; padding: 20px; background-color: #4b4e6d;">

        <div><img src="{{ asset('images/logo.png') }}" alt="icon" ></div>

        <h2 style="color: white;">Verificação de Email</h2>
        <p style="color: white; ">Olá, <strong>{{ $user->primeiro_nome }}</strong>.</p>
        <p style="color: white; ">Obrigado por criar uma conta!</p>
        <p style="color: white; ">Por favor, clique no link abaixo para verificar seu endereço de email:</p>
        <p>
            <a href="{{ route('validar', $user->id) }}"
                style="display: inline-block; padding: 10px 20px; background-color: #fb8500; color: #fff; text-decoration: none; border-radius: 5px;">Verificar
                Email</a>
        </p>
        <p style="color: white; ">Se você não criou esta conta, por favor, ignore este email.</p>
        <p style="color: white; ">Obrigado.<br></p>
    </div>


</body>

</html>
