<!DOCTYPE html>
<html>
<head>
    <title>Restablecimiento de contraseña</title>
</head>
<body>
    <h1>Restablecimiento de contraseña</h1>
    <p>Haz clic en el siguiente enlace para restablecer tu contraseña:</p>
    <a href="{{ url('/reset-password?token='.$token.'&id='.$id) }}">
    Restablecer contraseña
</a></body>
</html>