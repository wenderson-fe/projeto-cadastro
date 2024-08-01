<?php

    include('conexao.php'); // inclui o arquivo 'conexao.php'

    $sql = "SELECT * FROM usuarios ORDER BY id DESC"; // consulta no banco de dados. Onde todos os registros da tabela 'usuarios' são ordenados pelo campo 'id' em ordem decrescente (do mais recente para o mais antigo)

    $result = $conexao->query($sql) or die($conexao->error); // consulta sql no banco de dados. O resultado é armazenado na variável "$result", se ocorrer algum erro, uma mensagem sera exibida

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <style>
            body{
                background-color: #008F8C;
            }

            main{
                display: flex;
                justify-content: center;
            }

            h1{
                color: white;
                text-align: center;
                margin: 10px;
            }

        </style>
</head>

<body>
<h1>Registros</h1>
    <main>
        <div id="tabela">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Sobrenome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Senha</th>
                        <th scope="col">Gênero</th>
                        <th scope="col">...</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($dado = mysqli_fetch_assoc($result)) // O método mysqli_fetch_assoc($result) é usado para buscar o próximo registro da consulta e armazená-lo na variável $dado
                        {
                            echo "<tr>";
                            echo "<td>".$dado["id"]."</td>";
                            echo "<td>".$dado["nome"]."</td>";
                            echo "<td>".$dado["sobrenome"]."</td>";
                            echo "<td>".$dado["email"]."</td>";
                            echo "<td>".$dado["celular"]."</td>";
                            echo "<td>".$dado["confSenha"]."</td>";
                            echo "<td>".$dado["genero"]."</td>";
                            echo "<td>
                                <a class='btn btn-sm btn-primary' href='edit.php?id=$dado[id]'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                                </svg>
                                </a>
                                <a class='btn btn-sm btn-danger' href='delete.php?id=$dado[id]'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
                                <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z'/>
                              </svg>
                                </a>
                            </td>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </main>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>