<?php
    $dbHost = 'Localhost'; // Esta linha define o host do banco de dados

    $dbUsername = 'root'; //nome de usuário que será usado para se conectar ao banco de dados

    $dbPassword = ''; //Essa linha define a senha usada para autenticar a conexão ao banco de dados

    $dbName = 'formulario-wenderson'; //Aqui, você especifica o nome do banco de dados ao qual deseja se conectar

    $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName); //estabelece a conexão com o servidor MySQL.

    // if($conexao->connect_errno){
    //     echo "Erro";
    // }
    // else {
    //     echo "Conexão efetuada com sucesso";
    // }
?>