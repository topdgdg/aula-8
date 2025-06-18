<?php
$ark = fopen("media.txt", "w");
$num = [];

while (true) {
    $input = readline("Insira números ou digite 'sair' para finalizar:");
    
    if (strtolower($input) == "sair") {
        break;
    }
    
    if (is_numeric($input)) {
        $num[] = (float)$input;
    } else {
        echo "Entrada inválida. Insira um número válido.\n";
    }
}

fclose($ark);

$ark = implode("\n", $num);
if (file_put_contents("media.txt", $ark) !== false) {
    echo "Informções salvas com sucesso no arquivo!\n";
} else {
    echo "Erro ao salvar as informações!";
}

$resil = array_sum($num) / count($num);
echo "A média dos números cadastrados é: " . number_format($resil, 2) . "\n";
?>