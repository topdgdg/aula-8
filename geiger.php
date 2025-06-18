<?php
$arc = fopen("geiger.txt", "r");
if ($arc) {
    $conteudo = fread($arc, filesize("geiger.txt"));
    fclose($arc);    

    $a = readline("Digite uma palavra a ser contada:");

    $num = substr_count($conteudo, $a);
    if (strpos($conteudo, "$a") !== false) {
        echo "A palavra $a foi encontrada no arquivo!\n";
        echo "$num vezes contadas!";
    } else {
        echo "A palavra $a não foi encontrada.";
    }
  
} else {
    echo "Erro ao abrir o arquivo!";
}
?>