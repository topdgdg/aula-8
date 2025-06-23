<?php
$file = "login.txt";

echo "Nome de usuário: ";
$arc = fopen("usuarios.txt", "w");
$usuario = (fgets($arc));

echo "Senha: ";
$senha = (fgets($arc));

fclose($arc);
$data = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$loginValido = false;

foreach ($data as $linha) {
    list($user, $pass) = explode(", ", $linha);
    if ($usuario === $user && $senha === $pass) {
        $loginValido = true;
        break;
    }
}

if ($loginValido) {
    echo "Login bem-sucedido!\n";
} else {
    echo "Nome de usuário ou senha incorretos.\n";
}
?>