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

        <h2 style="color: white;">Verificação de Email</h2>
        <p style="color: white;">Olá, <strong>Admin</strong>.</p>
        <p style="color: white;">Um novo usuário tentou criar uma conta para instituição que requer validação.</p>
        <p style="color: white;">Aqui estão os detalhes:</p>

        <ul>
            <li style="color: white; line-height:1.5;"><strong>Nome do Usuário:</strong> {{ $user->primeiro_nome }}</li>
            <li style="color: white; line-height:1.5;"><strong>Email:</strong> {{ $user->email }}</li>
            <li style="color: white; line-height:1.5;"><strong>NIF:</strong> {{ $user->NIF }}</li>
        </ul>

        <p style="color: white;">Por favor, carregue no botão abaixo se quiser validar a conta.</p>
        <p>
            <a href="{{ route('validar', $user->id) }}"
                style="display: inline-block; padding: 10px 20px; background-color: #fb8500; color: #fff; text-decoration: none; border-radius: 5px;">Verificar
                Email</a>
        <p style="color: white;">Obrigado.<br>
        </p>
    </div>

</body>
</html>
