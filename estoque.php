<?php

$file = "estoque.txt";

$arc = fopen("estoque.txt", "w");
$arrayAssociativo = [];

while (true) {
    $a = readline("Insira o nome do protudo:");
    $b = readline("Insira uma quantidade:");
    $c = readline("Insira um preço:");
    $e = readline("Quer sair?");
    $f = readline("Quer mudar o preço"):
    $d = $b * $c;
    $arrayAssociativo[] = "$a, $b, $c, $d";

    if (strtolower($e) == "sair") {
        break;
    }
        
}

if ($arc {
    $conteudo = fread($arquivo, filesize("estoque.txt"));
    fclose($arquivo);
    
    $a = readline("Digite um protudo para alterar seu preço:");
    if (strpos($conteudo, "$a") !== false) {
        echo "A palavra $a foi encontrada no arquivo!\n";
    } else {
        echo "A palavra $a não foi encontrada.";
        exit();
    }
    $c = readline("Qual é o novo preço:");

$arrayAssociativo = [
    "produto" => "$a",
    "preço" => $c,
    
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

fclose($arc);

file_put_contents($file, implode("\n", $arrayAssociativo));
$data = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$totalgeral = 0;

foreach ($data as $linha) {
    $partes = explode(", ", $linha);
    $totalgeral += (float)$partes[3];
}

echo "A média dos preços cadastrados é: " . number_format($totalgeral, 2) . "\n";
?>