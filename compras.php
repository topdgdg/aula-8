<?php

$file = "compras.txt";

$ark = fopen("compras.txt", "w");
$arrayAssociativo = [];

while (true) {
    $a = readline("Insira um produto:");
    $b = readline("Insira uma quantidade:");
    $c = readline("Insira um preço:");
    $e = readline("Quer sair?");
    $d = $b * $c;
    $arrayAssociativo[] = "$a, $b, $c, $d";

    if (strtolower($e) == "sair") {
        break;
    }
        
}

fclose($ark);

file_put_contents($file, implode("\n", $arrayAssociativo));
$data = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$totalgeral = 0;

foreach ($data as $linha) {
    $partes = explode(", ", $linha);
    $totalgeral += (float)$partes[3];
}

echo "A média dos preços cadastrados é: " . number_format($totalgeral, 2) . "\n";
?>