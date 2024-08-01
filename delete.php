<?php

if (!empty($_GET['id'])) { // Verifica se o parâmetro GET chamado 'id' foi fornecido na URL e se não está vazio. 

    include_once('conexao.php'); // Inclui o arquivo 'conexao.php'

    $id = $_GET['id']; // O valor do parâmetro 'id' é armazenado na variável id.

    $sqlSelect = "SELECT * FROM usuarios WHERE id= $id"; // Consulta para selecionar todos os campos da tebela 'usuario' no banco de dados, onde o valor da coluna 'id' seja igual ao valor contido na variável '$id'.

    $result = $conexao->query($sqlSelect); // A consulta SQL definida em $sqlSelect é executada no banco de dados, e o resultado é armazenado na variável $result.

    if($result->num_rows > 0) // Verifica se a consulta retornou pelo menos um registro.
    {
        $sqlDelete = "DELETE FROM usuarios WHERE id=$id"; //  Remove o registro da tabela 'usuarios' onde o campo 'id' corresponde ao valor da variável $id.

        $resultDelete = $conexao->query($sqlDelete); // executa a consulta de exclusão contida em $sqlDelete no banco de dados.

    }
    header('Location: sistema.php'); // redireicona para a página sistema.php
    
}

?>