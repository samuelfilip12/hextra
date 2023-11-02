<?php

include("app/classes/conexao.php");

// Obter os dados do formulário
$tabela_existente = $_POST['tabela_existente'];
$tabela_nova = $_POST['tabela_nova'];

// Criar a nova tabela
$sql = "CREATE TABLE `" . $tabela_nova . "` (";

//Percorrer a lista de colunas da tabela existente
$colunas = $conn->query("SHOW COLUMNS FROM $tabela_existente");
while ($coluna = $colunas->fetch_assoc()) {

// Adicionar a coluna ao comando SQL
  $sql .= "`" . $coluna['Field'] . "` " . $coluna['Type'] . " " . $coluna['Null'] . " " . $coluna['Default'] . ",";

}

// Remover a vírgula do final do comando SQL
$sql = substr($sql, 0, -1);

// Adicionar o comando SQL para criar a chave primária
$sql .= ", PRIMARY KEY (`id`))";

// Executar o comando SQL para criar a nova tabela
$conn->query($sql);

// Fechar a conexão 
$conn->close();

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cabeçalho</title>
</head>

<body>

    <nav>
        <form action="criar-tabela.php" method="post">
            <input type="text" name="tabela_existente" placeholder="Nome da tabela existente">
            <input type="text" name="tabela_nova" placeholder="Nome da tabela nova">
            <input type="submit" value="Criar tabela">
        </form>
    </nav>

</body>

</html>