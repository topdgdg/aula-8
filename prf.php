<?php
$file = "prf.txt";
$arc = fopen("prf.txt", "w");

while (true) {
    echo "\n1. Cadastrar nota fiscal\n2. Consultar notas fiscais\n3. Sair\nEscolha uma opção: ";
    $opcao = trim(fgets($arc));

    switch($opcao) {
        case 1: {
        echo "Número da nota fiscal: ";
        $numero = trim(fgets($arc));
        echo "Data (DD/MM/AAAA): ";
        $data = trim(fgets($arc));
        echo "Valor: ";
        $valor = trim(fgets($arc));

        if (is_numeric($valor)) {
            file_put_contents($file, "$numero, $data, $valor\n", FILE_APPEND);
            echo "Nota fiscal cadastrada!\n";
        } else {
            echo "Valor inválido.\n";
        }
    } 
        case 2: {
        echo "Notas fiscais cadastradas:\n";
        if (file_exists($file)) {
            echo file_get_contents($file);
        } else {
            echo "Nenhuma nota fiscal encontrada.\n";
        }
    } 
    
        case 3:
        break;
     else {
        echo "Opção inválida.\n";
    }
}
}

fclose($arc);
?>
