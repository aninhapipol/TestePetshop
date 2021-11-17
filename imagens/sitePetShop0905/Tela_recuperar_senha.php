<!DOCTYPE html>
<html>

<head>
    <link href="css/Tela_recuperar_senha_CSS.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Recuperar Senha</title>
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
                <h1>Recuperar Senha</h1>
                <form action="" method="post">

                    <div class="recu">
                        <label for="email"><b>E-mail</b></label>
                        <input type="text" placeholder="Digite seu E-email" name="email" required>
                        <button type="submit">Recuperar</button>
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
</body>

</html>