<?php
$file = "agenda.txt";
$arc = fopen("agenda.txt", "w");

function lerAgenda($file) {
    return file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}

function salvarAgenda($file, $dados) {
    file_put_contents($file, implode("\n", $dados));
}

while (true) {
    echo "\n1. Adicionar contato\n2. Consultar contato\n3. Excluir contato\n4. Sair\nEscolha uma opção: ";
    $opcao = trim(fgets($arc));

    switch ($opcao) {
        case 1:
            echo "Nome: ";
            $nome = trim(fgets($arc));
            echo "Telefone: ";
            $telefone = trim(fgets($arc));

            $agenda = lerAgenda($file);
            $agenda[] = "$nome, $telefone";
            salvarAgenda($file, $agenda);
            echo "Contato adicionado!\n";
            break;

        case 2:
            echo "Nome do contato: ";
            $nomeBusca = trim(fgets($arc));
            $agenda = lerAgenda($file);
            $encontrado = false;

            foreach ($agenda as $linha) {
                list($nome, $telefone) = explode(", ", $linha);
                if ($nome == $nomeBusca) {
                    echo "Telefone de $nome: $telefone\n";
                    $encontrado = true;
                    break;
                }
            }
            if (!$encontrado) {
                echo "Contato não encontrado.\n";
            }
            break;

        case 3:
            echo "Nome do contato a excluir: ";
            $nomeBusca = trim(fgets($arc));
            $agenda = lerAgenda($file);
            $novaAgenda = [];
            $encontrado = false;

            foreach ($agenda as $linha) {
                list($nome, $telefone) = explode(", ", $linha);
                if ($nome == $nomeBusca) {
                    $encontrado = true;
                } else {
                    $novaAgenda[] = $linha;
                }
            }

            if ($encontrado) {
                salvarAgenda($file, $novaAgenda);
                echo "Contato excluído!\n";
            } else {
                echo "Contato não encontrado.\n";
            }
            break;

        case 4:
            fclose($arc);
            exit("Encerrando programa...\n");

        default:
            echo "Opção inválida.\n";
    }
}
?>