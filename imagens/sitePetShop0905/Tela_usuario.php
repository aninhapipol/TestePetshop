<?php
session_start();
if (!isset($_SESSION['cli_id'])) {
    header("location: Tela_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <link href="css/Tela_usuario_CSS.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Perfil</title>
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

        <div class="carrinho_login">
            <a href="" target="_self">
                <img id="imagem_carrinho" src="imagens/carrinho_icon.png">
            </a>
            <a href="" target="_self">
                <img id="imagem_user" src="imagens/user_icon.png">
            </a>
        </div>



        <!-- Conteudo-->
        <center>
            <div class="content">

                <html>
                <?php
                require("conexao.php");

                $query = "SELECT * FROM cliente WHERE cli_id = $_SESSION[cli_id]";
                $result_query = mysqli_query($conn, $query);
                while ($ln = mysqli_fetch_assoc($result_query)) {
                    echo "<img src='uploads/".$ln['cli_foto']."' height = 'auto' width = '11%'>";
                }

                ?>


                <body>
                    <form action="upload.php" method="POST" enctype="multipart/form-data">
                        <input type="file" name="file">
                        <input type="submit" name="submit" value="Atualizar">
                    </form>
                </body>

                </html>


                <h2>Bem Vindo!</h2>

                <div class="row">

                    <div class="dados_usuario">
                        <?php
                        require("conexao.php");

                        $query = "SELECT * FROM cliente WHERE cli_id = $_SESSION[cli_id]";
                        $result_query = mysqli_query($conn, $query);
                        while ($ln = mysqli_fetch_assoc($result_query)) {
                            echo '<h4>Nome: </h4>';
                            echo '<h4>' . $ln['cli_nome'] . '</h4>';
                        }
                        ?>
                        </br>
                        <?php
                        require("conexao.php");

                        $query = "SELECT * FROM cliente WHERE cli_id = $_SESSION[cli_id]";
                        $result_query = mysqli_query($conn, $query);
                        while ($ln = mysqli_fetch_assoc($result_query)) {
                            echo '<h4>Endereço: </h4>';
                            echo '<h4>' . $ln['cli_end'] . '</h4>';
                        }
                        ?>
                        </br>
                        <?php
                        require("conexao.php");

                        $query = "SELECT * FROM cliente WHERE cli_id = $_SESSION[cli_id]";
                        $result_query = mysqli_query($conn, $query);
                        while ($ln = mysqli_fetch_assoc($result_query)) {
                            echo '<h4>Data de Nascimento: </h4>';
                            echo '<h4>' . $ln['cli_nasci'] . '</h4>';
                        }
                        ?>
                        </br>
                    </div>

                    <div class="animais_usuario">
                        <h4>Animal</h4>
                        <?php
                        require("conexao.php");

                        $query = "SELECT * FROM cliente WHERE cli_id = $_SESSION[cli_id]";
                        $result_query = mysqli_query($conn, $query);
                        //$animal = $query['cli_animal'];
                        while ($ln = mysqli_fetch_assoc($result_query)) {
                            if ($ln['cli_animal'] == 'Felino') {
                                echo ' <img id="imagem_gato" src="imagens/gato_icon.png"></a>';
                            } else if ($ln['cli_animal'] == 'Canino') {
                                echo ' <img id="imagem_cachorro" src="imagens/cachorro_icon.png"></a>';
                            } else {
                                echo ' <img id="imagem_hamster" src="imagens/hamster_icon.png"></a>';
                            }
                        }
                        ?>
                    </div>

                </div>

                <button onclick="window.location.href = 'php/sair.php'">Sair</button>


            </div>
        </center>


        <!-- Rodapé -->
        <center>
            <div class="footer">

                <a>Point do pet - Endereço: R. Augusta, 1508 - Consolação, São Paulo - SP - CEP: 01304-001</a></br>
                <a>Projeto P.I. 5º Semestre - Ciência da computação / Analise e desenvolvimento de software.</a>

            </div>
        </center>
    </div>
</body>

</html>