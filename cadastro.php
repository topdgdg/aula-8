<?php

$file = "cadastro.txt";
$ark = fopen("cadastro.txt", "w");
$alunos= [];

while (true) {
    $nome = readline("Digite o nome do aluno ou 'sair' para finalizar: ");
    if (strtolower($nome) === "sair") {
        break;
    }

    $notas = [];
    for ($i = 1; $i <= 3; $i++) {
        $nota = (float) readline("Digite a nota $i: ");
        $notas[] = $nota;
    }

    $alunos[] = [
        "nome" => $nome,
        "notas" => $notas,
        "media" => array_sum($notas) / count($notas)
    ];
}
fclose($ark);

foreach ($alunos as $aluno) {
    echo "Nome: {$aluno['nome']}\n";
    echo "Notas: " . implode(", ", $aluno['notas']) . "\n";
    echo "Média: " . number_format($aluno['media'], 2) . "\n";
}

$conteudo = serialize($alunos);
if (file_put_contents("cadastro.txt", $conteudo) !== false) {
    echo "Informação foda adicionada com sucesso!";
} else {
    echo "Não deu!";
}
?>