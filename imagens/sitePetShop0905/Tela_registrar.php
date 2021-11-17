<?php
require_once 'php/classes.php';
$u = new usuario;
?>

<!DOCTYPE html>
<html>

<head>
    <link href="css/Tela_registrar_CSS.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Registrar</title>
</head>

<body>
    <div id="pagina">
        <!-- Cabecalho -->
        <div class="header">
        <div class="logo">
                <a href="index.php" target="_self">
                    <img id="imagem_logo" src="imagens/logo2.png">
                </a>
            </div>
            <div class="filtros">
                <a href="Tela_produtos.php" target="_self">
                    <img id="imagem_gato" src="imagens/produtos_icon.png">
                </a>

                <a href="Tela_produtos.php" target="_self">
                    <img id="imagem_promocao" src="imagens/promocao_icon.png">
                </a>
            </div>
            <div class="carrinho_login">
                <a href="Tela_carrinho.php" target="_self">
                    <img id="imagem_carrinho" src="imagens/carrinho_icon.png">
                </a>
                <a href="redirecionar.php" target="_self">
                    <img id="imagem_user" src="imagens/user_icon.png">
                </a>
            </div>
        </div>


        <!-- Conteudo-->
        <center>
            <div class="content">
                <h1>Registrar</h1>

                <form action="" method="post">

                    <div class="registrar">
                        <label for="nome"><b>Nome Completo</b></label>
                        <input type="text" placeholder="Digite seu Nome Completo" name="nome" maxlength="30" required>

                        <label for="cpf"><b>CPF</b></label>
                        <input type="text" placeholder="Digite seu CPF" name="cpf" maxlength="11" required>

                        <label for="nascimento"><b>Data de Nascimento</b></label>
                        <input type="date" placeholder="Data de Nascimento" name="nascimento" required>

                        <label for="cep"><b>CEP</b></label>
                        <input type="text" placeholder="Digite seu CEP" name="cep" maxlength="9" required>

                        <label for="end"><b>Endereço</b></label>
                        <input type="text" placeholder="Digite seu Endereço" name="endereco" maxlength="60" required>

                        <label for="cidade"><b>Cidade</b></label>
                        <input type="text" placeholder="Digite sua cidade" name="cidade" maxlength="30" required>

                        <label for="estado"><b>Estado</b></label>
                        <select id="estado" name="estado">
                            <option value="AC">AC</option>
                            <option value="AL">AL</option>
                            <option value="AP">AP</option>
                            <option value="AM">AM</option>
                            <option value="BA">BA</option>
                            <option value="CE">CE</option>
                            <option value="DF">DF</option>
                            <option value="ES">ES</option>
                            <option value="GO">GO</option>
                            <option value="MA">MA</option>
                            <option value="MT">MT</option>
                            <option value="MS">MS</option>
                            <option value="MG">MG</option>
                            <option value="PA">PA</option>
                            <option value="PB">PB</option>
                            <option value="PR">PR</option>
                            <option value="PE">PE</option>
                            <option value="PI">PI</option>
                            <option value="RJ">RJ</option>
                            <option value="RN">RN</option>
                            <option value="RS">RS</option>
                            <option value="RO">RO</option>
                            <option value="RR">RR</option>
                            <option value="SC">SC</option>
                            <option value="SP">SP</option>
                            <option value="SE">SE</option>
                            <option value="TO">TO</option>
                        </select>

                        <label for="animal"><b>Tipo de Animal</b></label>
                        <select id="animal" name="animal">
                            <option value="Felino">Felino</option>
                            <option value="Canino">Canino</option>
                            <option value="Roedor">Roedor</option>
                        </select>

                        <label for="email"><b>E-mail</b></label>
                        <input type="text" placeholder="Digite seu E-mail" name="email" maxlength="40" required>

                        <label for="senha"><b>Senha</b></label>
                        <input type="password" placeholder="Digite sua senha" name="senha" maxlength="15" required>

                        <label for="rsenha"><b>Repetir Senha</b></label>
                        <input type="password" placeholder="Repita sua senha" name="rsenha" maxlength="15" required>

                        <button type="submit">Registrar</button>
                        <a href="Tela_login.php">Voltar</a>
                    </div>

                </form>

            </div>

        </center>

        <center>
            <div class="footer">

                <a>Point do pet - Endereço: R. Augusta, 1508 - Consolação, São Paulo - SP - CEP: 01304-001</a></br>
                <a>Projeto P.I. 5º Semestre - Ciência da computação / Analise e desenvolvimento de software.</a>

            </div>
        </center>
    </div>


    <?php
    if (isset($_POST['nome'])) {
        $nome = addslashes($_POST['nome']);
        $cpf = addslashes($_POST['cpf']);
        $nascimento = addslashes($_POST['nascimento']);
        $cep = addslashes($_POST['cep']);
        $endereco = addslashes($_POST['endereco']);
        $cidade = addslashes($_POST['cidade']);
        $estado = addslashes($_POST['estado']);
        $animal = addslashes($_POST['animal']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $rsenha = addslashes($_POST['rsenha']);
        if (!empty($nome) && !empty($email) && !empty($senha) && !empty($rsenha)) {
            $u->conectar("id15361524_banco_petshop", "localhost", "id15361524_root", "DogtechBR@2020");
            if ($u->msgErro == "") {
                if ($senha == $rsenha) {
                    if ($u->cadastrar($nome, $cpf, $nascimento, $cep, $endereco, $cidade, $estado, $animal, $email, $senha)) {
                        ?>
                        <div id="msg-sucesso">
                        Cadastrado com sucesso! Acesse para entrar!
                        </div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="msg-erro">
                            Email ja cadastrado!
                        </div>
                        <?php
                    }
                }
                else
                {
                    ?>
                    <div class="msg-erro">
                        Senha e confirmar senha não correspondem
                    </div>
                    <?php
                }
            }
            else
            {
                ?>
                <div class="msg-erro">
                    <?php echo "Erro: ".$u->msgErro;?>
                </div>
                <?php
            }
        }else
        {
            ?>
            <div class="msg-erro">
                Preencha todos os campos!
            </div>
            <?php
        }
    }
    ?>
</body>

</html>