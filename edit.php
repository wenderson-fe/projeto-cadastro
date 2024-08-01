<?php

if (!empty($_GET['id'])) { // verifica se o parâmetro GET chamado 'id' foi fornecido na URL. !empty($_GET['id']) verifica se o parâmetro não está vazio.

    include_once('conexao.php');

    $id = $_GET['id']; // o valor do parâmetro 'id' é armazenado na variável id.

    $sqlSelect = "SELECT * FROM usuarios WHERE id= $id"; // consulta para selecionar todos os campos da tebela 'usuario' no banco de dados, onde o valor da coluna 'id' seja igual ao valor contido na variável '$id'.

    $result = $conexao->query($sqlSelect); // '$sqlSelect' é executada no banco de dados, e o resultado é armazenado na variável $result.

    if($result->num_rows > 0) //verifica se a consulta retornou pelo menos um registro.
    {
        while($dado = mysqli_fetch_assoc($result)) // O método mysqli_fetch_assoc($result) é usado para buscar o próximo registro da consulta e armazená-lo na variável
        {
        $nome = $dado['nome'];
        $sobrenome = $dado['sobrenome'];
        $email = $dado['email'];
        $celular = $dado['celular'];
        $senha = $dado['senha'];
        $confSenha = $dado['confSenha'];
        $genero = $dado['genero'];
        }

    }
    else // redireicona para a página sistema.php
    {
        header('Location: sistema.php');
    }
    
}

else // se o parâmetro 'id' estiver vazio, redireicona para a página sistema.php
    {
        header('Location: sistema.php');
    }

?>


<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link rel="stylesheet" href="estilos/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <style>
            .voltarr{
                text-decoration: none;
                font-weight: bolder;
                color: black;
            }

            .voltar{
                border-radius: 0px 10px 10px 0px;
                text-align: center;
                width: 80px;
                background-color: #B6B6F8;
            }
        </style>
</head>

<body>
    <div class="voltar"><a href="sistema.php" class="voltarr">Voltar</a></div>
    <main>
        <section id="cadastro">
            <div id="imagem">
                <img id="maior" src="imagens/undraw_mobile_analytics_72sr.svg" alt="#">
                <img id="menor" src="imagens/undraw_hooked_re_vl59.svg" alt="#">
            </div>

            <div id="formulario">
                <h1>Cadastre-se</h1>
                <form id="form" action="salvarEdicao.php" method="POST">
                    <div class="inputs">
                        <div class="mb-3">
                            <label for="exampleInputText1" class="form-label">Primeiro Nome</label>
                            <input type="text" class="form-control required" value="<?php echo $nome ?>" id="exampleInputText1" name="nome"
                                aria-describedby="Primeiro-nome" oninput="validacaoNome()" required
                                placeholder="Digite seu primeiro nome">
                            <span class="span-required">Nome deve ter no mínino 5 caracteres</span>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputText2" class="form-label">Sobrenome</label>
                            <input type="text" class="form-control required" value="<?php echo $sobrenome ?>" id="exampleInputText2" name="sobrenome"
                                aria-describedby="Sobrenome" oninput="validacaoSobrenome()" required
                                placeholder="Digite seu sobrenome">
                            <span class="span-required">Sobrenome deve ter no minino 5 caracteres</span>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">E-mail</label>
                            <input type="email" class="form-control required" value="<?php echo $email ?>" id="exampleInputEmail1" name="email"
                                aria-describedby="E-mail" oninput="validacaoEmail()" required
                                placeholder="Digite seu e-mail">
                            <span class="span-required">Digite um e-mail válido</span>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputTel" class="form-label">Celular</label>
                            <input type="tel" class="form-control required phone_with_ddd" value="<?php echo $celular ?>" id="exampleInputTel"
                                name="celular" oninput="validacaoTel()" required placeholder="(xx) xxxx-xxxx">
                            <span class="span-required">Digite um número válido</span>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Senha</label>
                            <input type="text" class="form-control required" value="<?php echo $senha ?>" id="exampleInputPassword1"
                                oninput="validacaoSenha()" name="senha" required placeholder="Digite sua senha">
                            <span class="span-required">Senha deve ter no mínimo 8 caracteres</span>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword2" class="form-label">Confirme sua senha</label>
                            <input type="text" class="form-control required" value="<?php echo $confSenha ?>" id="exampleInputPassword2"
                                name="conf-senha" oninput="compareSenha()" required
                                placeholder="Digite sua senha novamente">
                            <span class="span-required">Senhas devem ser compatíveis</span>
                        </div>
                    </div>

                    <p>Gênero</p>
                    <div id="sexo">

                        <div>
                            <input class="form-check-input" type="radio" name="genero" id="flexRadioDefault1" required <?php echo ($genero == 'Feminino') ? 'checked' : '' ?>
                                value="Feminino">
                            <label class="form-check-label" for="flexRadioDefault1">Feminino</label>

                            <input class="form-check-input" type="radio" name="genero" id="flexRadioDefault2" <?php echo ($genero == 'Masculino') ? 'checked' : '' ?>
                                required value="Masculino">
                            <label class="form-check-label" for="flexRadioDefault2">Masculino</label>

                            <input class="form-check-input" type="radio" name="genero" id="flexRadioDefault3" required <?php echo ($genero == 'Outros') ? 'checked' : '' ?>
                                value="Outros">
                            <label class="form-check-label" for="flexRadioDefault3">Outros</label>

                            <span>
                                <input class="form-check-input" type="radio" name="genero" id="flexRadioDefault4" <?php echo ($genero == 'Prefiro não informar') ? 'checked' : '' ?>
                                    required value="Prefiro não informar">
                                <label class="form-check-label" for="flexRadioDefault4">Prefiro não informar</label>
                            </span>
                        </div>
                    </div>

                    <div class="botao">
                        <button type="submit" name="update" class="btn btn-primary">Enviar</button>
                        <button type="reset" class="btn btn-primary">Apagar</button>
                    </div>
            </div>

            <input type="hidden" name="id" value="<?php echo $id ?>">
            </form>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <script src="script.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>

</body>

</html>