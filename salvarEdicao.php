<?php

    include_once('conexao.php'); //nclui o arquivo 'conexao.php'

    if(isset($_POST['update'])) //verifica se o formulário de atualização foi submetido.
    { 
        //Se o formulário foi submetido, os dados do formulário são recuperados e armazenados em variáveis.
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];
        $celular = $_POST['celular'];
        $senha = $_POST['senha'];
        $confSenha = $_POST['conf-senha'];
        $genero = $_POST['genero'];

        // Aqui, é criada uma consulta SQL para atualizar os dados do registro de usuário no banco de dados.
        $sqlUpdate = "UPDATE usuarios SET nome='$nome', sobrenome='$sobrenome', email='$email', celular='$celular', senha='$senha', confSenha='$confSenha', genero='$genero'
        WHERE id='$id'";

        $result = $conexao->query($sqlUpdate); //O resultado da operação de atualização é armazenado na variável '$result'.
    }

    header("Location: sistema.php"); // se o formulário não foi submetido, o usuário e redirecionado para a página sistema.php.

?>