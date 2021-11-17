<?php
ob_start();
require_once './php/classes.php';
$u = new usuario;
?>

<!DOCTYPE html>
<html>

<head>
    <link href="css/Tela_login_CSS.css" rel="stylesheet">
    <title>Login</title>
    <meta charset="UTF-8">
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
                <h1>Login</h1>
                <form action="" method="post">

                    <div class="login">
                        <label for="email"><b>E-mail</b></label>
                        <input type="text" placeholder="Digite seu E-email" name="email" required>

                        <label for="senha"><b>Senha</b></label>
                        <input type="password" placeholder="Digite sua senha" name="senha" required>

                        <button type="submit">Entrar</button>
                        <label>
                            <input type="checkbox" checked="checked" name="remember"> Lembrar
                        </label>
                    </div>

                    <div class="login" style="background-color:#f1f1f1">
                        <a>Não tem cadastro?</a> <a href="Tela_registrar.php">Cadastre Aqui</a></br>
                        <a>Esqueceu sua</a> <a href="Tela_recuperar_senha.php">senha?</a>
                    </div>
                </form>

            </div>
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
    if (isset($_POST['email'])) {
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        if (!empty($email) && !empty($senha)) {
            $u->conectar("id15361524_banco_petshop", "localhost", "id15361524_root", "DogtechBR@2020");
            if ($u->msgErro == "") {
                if ($u->logar($email, $senha)) {
                    header("location: ./php/area_privada.php"); //Proxima tela
                    //echo "<script language='javaScript'>window.location.href=''</script>";
                } else {
                ?>
                    <div class="msg-erro">
                        "Email e/ou senha incorretos.";
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="msg-erro">
                    <?php echo "Erro: " . $u->msgErro;
                    ?>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="msg-erro">
                "Preencha todos os campos!";
            </div>
    <?php
        }
    }
    ?>

</body>

</html>