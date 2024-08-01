<?php

if (isset($_POST['submit'])) { // verifica se o formulário foi enviado

    include_once('conexao.php'); // inclui o arquivo 'conexao.php'

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $celular = $_POST['celular']; // coleta os valores enviados pelo formulário HTML
    $senha = $_POST['senha'];
    $confSenha = $_POST['conf-senha'];
    $genero = $_POST['genero'];

    // Validar os campos
    $emailRegex = '/[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/';
    $celularRegex = '/(\(?\d{2}\)?\s)?(\d{4,5}\-\d{4})/';
    if (strlen($nome) < 5 || strlen($sobrenome) < 5) {
        $alerta = 'Nome e sobrenome devem ter no mínimo 5 caracteres.';
    } elseif (!preg_match($emailRegex, $email)) {
        $alerta = 'Email inválido.';
    } elseif (!preg_match($celularRegex, $celular)) {
        $alerta = 'Número inválido.';
    } elseif (strlen($senha) < 8) {
        $alerta = 'Senha deve ter no mínimo 8 caracteres.';
    } elseif ($senha !== $confSenha) {
        $alerta = 'A confirmação de senha não corresponde com a senha digitada.';
    } elseif (empty($genero)) {
        $alerta = 'Selecione um gênero.';
    } else {
        // Todas as validações passaram
        $result = mysqli_query($conexao, "INSERT INTO usuarios(nome, sobrenome, email, celular, senha,  confSenha, genero) VALUES ('$nome', '$sobrenome', '$email', '$celular', '$senha', '$confSenha',  '$genero')"); // executa uma consulta SQL para inserir os valores coletados do formulário na     tabela 'usuarios' do banco de dados.

        $sql = "SELECT * FROM usuarios ORDER BY id DESC"; //todos os registros da tabela 'usuarios' são     ordenados pelo campo 'id' em ordem decrescente (do mais recente para o mais antigo)

        $result2 = $conexao->query($sql); //consulta a SQL definida em $sql no banco de dados e armazena o resultado na variável $result2.
    }
}

?>


<!doctype html>
<html lang="pt-br">

<head>
    <!-- Se houver um alerta, exibe-o usando JavaScript -->
    <?php if (isset($alerta)){ ?>
        <script type="text/javascript">
            window.onload = function() {
                alert('<?php echo $alerta; ?>');
            }
        </script>
    <?php }; ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link rel="stylesheet" href="estilos/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <main>
        <section id="cadastro">
            <div id="imagem">
                <img id="maior" src="imagens/undraw_mobile_analytics_72sr.svg" alt="#">
                <img id="menor" src="imagens/undraw_hooked_re_vl59.svg" alt="#">
            </div>

            <div id="formulario">
                <h1>Cadastre-se</h1>
                <form id="form" action="index.php" method="POST">
                    <div class="inputs">
                        <div class="mb-3">
                            <label for="exampleInputText1" class="form-label">Primeiro Nome</label>
                            <input type="text" class="form-control required" id="exampleInputText1" name="nome"
                                aria-describedby="Primeiro-nome" oninput="validacaoNome()" required
                                placeholder="Digite seu primeiro nome">
                            <span class="span-required">Nome deve ter no mínino 5 caracteres</span>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputText2" class="form-label">Sobrenome</label>
                            <input type="text" class="form-control required" id="exampleInputText2" name="sobrenome"
                                aria-describedby="Sobrenome" oninput="validacaoSobrenome()" required
                                placeholder="Digite seu sobrenome">
                            <span class="span-required">Sobrenome deve ter no minino 5 caracteres</span>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">E-mail</label>
                            <input type="email" class="form-control required" id="exampleInputEmail1" name="email"
                                aria-describedby="E-mail" oninput="validacaoEmail()" required
                                placeholder="Digite seu e-mail">
                            <span class="span-required">Digite um e-mail válido</span>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputTel" class="form-label">Celular</label>
                            <input type="tel" class="form-control required phone_with_ddd" id="exampleInputTel"
                                name="celular" oninput="validacaoTel()" required placeholder="(xx) xxxx-xxxx">
                            <span class="span-required">Digite um número válido</span>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Senha</label>
                            <input type="password" class="form-control required" id="exampleInputPassword1"
                                oninput="validacaoSenha()" name="senha" required placeholder="Digite sua senha">
                            <span class="span-required">Senha deve ter no mínimo 8 caracteres</span>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword2" class="form-label">Confirme sua senha</label>
                            <input type="password" class="form-control required" id="exampleInputPassword2"
                                name="conf-senha" oninput="compareSenha()" required
                                placeholder="Digite sua senha novamente">
                            <span class="span-required">Senhas devem ser compatíveis</span>
                        </div>
                    </div>

                    <p>Gênero</p>
                    <div id="sexo">

                        <div>
                            <input class="form-check-input" type="radio" name="genero" id="flexRadioDefault1" required
                                value="Feminino">
                            <label class="form-check-label" for="flexRadioDefault1">Feminino</label>

                            <input class="form-check-input" type="radio" name="genero" id="flexRadioDefault2" checked
                                required value="Masculino">
                            <label class="form-check-label" for="flexRadioDefault2">Masculino</label>

                            <input class="form-check-input" type="radio" name="genero" id="flexRadioDefault3" required
                                value="Outros">
                            <label class="form-check-label" for="flexRadioDefault3">Outros</label>

                            <span>
                                <input class="form-check-input" type="radio" name="genero" id="flexRadioDefault4"
                                    required value="Prefiro não informar">
                                <label class="form-check-label" for="flexRadioDefault4">Prefiro não informar</label>
                            </span>
                        </div>
                    </div>

                    <div class="botao">
                        <button type="submit" name="submit" class="btn btn-primary">Enviar</button>
                        <button type="reset" class="btn btn-primary">Apagar</button>
                    </div>
            </div>

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