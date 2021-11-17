<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Point do Pet</title>
    
    <link rel="stylesheet" href="css/Tela_index.css">
    <link rel="stylesheet" href="css/Tela_produtos_CSS.css">
    <meta charset="UTF-8">
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/script.js"></script>
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
            <div class="carrinho_login">
                <a href="Tela_carrinho.php" target="_self">
                    <img id="imagem_carrinho" src="imagens/carrinho_icon.png">
                </a>
                <a href="redirecionar.php" target="_self">
                    <img id="imagem_user" src="imagens/user_icon.png">
                </a>
            </div>
            <div class="category_list">
                <a href="#" class="category_item" category="all">
                    <img id="imagem_cachorro" src="imagens/mountain_icon.png">
                </a>
                <a href="#" class="category_item" category="Felino">
                    <img id="imagem_gato" src="imagens/gato_icon.png">
                </a>
                <a href="#" class="category_item" category="Canino">
                    <img id="imagem_cachorro" src="imagens/cachorro_icon.png">
                </a>
                <a href="#" class="category_item" category="Roedor">
                    <img id="imagem_hamster" src="imagens/hamster_icon.png">
                </a>
                <a href="#" class="category_item" category="promocoes">
                    <img id="imagem_promocao" src="imagens/promocao_icon.png">
                </a>
             </div>
        </div>
        <div class="content">
        <center>
            <div id="filtros_produtos">
                    <section class="products-list">
                        <?php
                            require("conexao.php");

                            $query = "SELECT * FROM produto";
                            $result_query = mysqli_query($conn, $query);
                            while ($ln = mysqli_fetch_assoc($result_query)) {
                                echo '<div class="product-item" category="'.$ln['pro_tipo'].'">';
                                echo '<img src="imagens/'.$ln['pro_foto'].'" />';
                                echo '<h4>' . $ln['pro_nome'] . '</h4>';
                                echo ' <div class="preco"><a href="Tela_produtos_detalhes.php?pro_id=' . $ln['pro_id'] . '">R$' . number_format($ln['pro_valor'], 2, ',', '.') . '</a></div>';
                                echo '</div>';
                            }
                        ?>
                    </section>
                </div>
        </center>
        </div>

        <!--Rodapé-->
        <div class="footer">
            <div class="dadosEmpresa">
                <h2 class="enderecoContato">Endereço e Contato</h2>
                <h3 class="endereco">Endereço: R. Augusta, 1508 - Consolação, São Paulo - SP,<br /> 01304-001
                </h3>
                <h3 class="contato">Contato: (11) 99283-3067</h3>
                <h3 class="email">Email: brenoreges@outlook.com</h3>
                <h2 class="agradecimento">Obrigado por nós escolher ;)</h2>
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.3289553029376!2d-46.661002885905596!3d-23.556626184685214!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce58348d040de7%3A0x3faa367cc3f3edd1!2sFAM%20-%20Campus%20Paulista!5e0!3m2!1spt-BR!2sbr!4v1588950577330!5m2!1spt-BR!2sbr"
                frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" class="mapa">
            </iframe>
            </div>  
        </div>
            <!--/Rodapé -->
    </div>
</body>
</html>