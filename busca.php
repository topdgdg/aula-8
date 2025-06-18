<?php
$arquivo = fopen("busca.txt", "r");
if ($arquivo) {
    $conteudo = fread($arquivo, filesize("busca.txt"));
    fclose($arquivo);
    
    $a = readline("Digite um protudo para alterar seu preço:");
    if (strpos($conteudo, "$a") !== false) {
        echo "A palavra $a foi encontrada no arquivo!\n";
    } else {
        echo "A palavra $a não foi encontrada.";
        exit();
    }
    $b = readline("Qual é o novo preço:");

$arrayAssociativo = [
    "produto" => "$a",
    "preço" => $b,
    
];
$conteudo = serialize($arrayAssociativo);
if (file_put_contents("busca.txt", $conteudo) !== false) {
    echo "Preço alterado!";
} else {
    echo "Não deu para salvar!";
}
} else {
    echo "Erro ao abrir o arquivo!";
}
?>