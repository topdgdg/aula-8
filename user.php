<?php
$arquivo = fopen("usuarios.txt", "w"); 

$a = readline("Digite seu nome:");
$b = readline("Digite sua idade:");
$c = readline("Digite seu email");
if ($arquivo) {
    fwrite($arquivo, "$a\n$b\n$c");
    echo "Conteúdo escrito com sucesso!";
} else {
    echo "Erro ao abrir o arquivo!";
}
fclose($arquivo);
?>