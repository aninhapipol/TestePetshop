<?php
if (isset($_GET["pro_id"])) {
    $_SESSION['page'] = $_GET["pro_id"];
    $page = $_SESSION['page'];
} else {
    $page = $_SESSION['page'];
    $tableName = $page . "r";
}
$con= mysqli_connect("localhost","id15361524_root","DogtechBR@2020","id15361524_banco_petshop");
mysqli_select_db($con, "id15361524_banco_petshop");

$incrementar = "UPDATE produto SET pro_clique = pro_clique + 1 WHERE pro_id = $_GET[pro_id]";
$resultado = mysqli_query($con, $incrementar);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link href="css/Tela_index.css" rel="stylesheet">
    <link href="css/Tela_produto_detalhes.css" rel="stylesheet">
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
            <a href="redirecionar.php" target="_self">
                <img id="imagem_carrinho" src="imagens/carrinho_icon.png">
            </a>
            <a href="Tela_login.php" target="_self">
                <img id="imagem_user" src="imagens/user_icon.png">
            </a>
        </div>
      </div>
    <div class="content">
    <div class="info_produtos">
                <div id="menuPequeno" class="boxProdutos">
                     <!--<div class="imagem_produto">-->
                    <?php
                    require("conexao.php");
                    $id = $_GET['pro_id'];
                    $query = "SELECT * FROM produto WHERE pro_id = '$id'";

                    $result_query = mysqli_query($conn, $query);
                    while ($ln = mysqli_fetch_assoc($result_query)) {
                        echo ' <a href="#"><img id="imagens_pequenas"  class="imagens_pequenas1" src="imagens/' . $ln['pro_foto'] . '"></a>
                        <a href="#"><img id="imagens_pequenas" class="imagens_pequenas2" src="imagens/produto_fundo.png"></a>
                        <a href="#"><img id="imagens_pequenas" class="imagens_pequenas3" src="imagens/produto_fundo.png"></a>';
                    }
                    
                    ?>

                </div>
                <div class="produto">
                    <?php
                    require("conexao.php");
                    $id = $_GET['pro_id'];
                    $query = "SELECT * FROM produto WHERE pro_id = '$id'";

                    $result_query = mysqli_query($conn, $query);
                    while ($ln = mysqli_fetch_assoc($result_query)) {
                        echo '<img id="imagem_grande" src="imagens/' . $ln['pro_foto'] . '">';
                    }
                    ?>
                </div>
                <div class="vender_produto">
                    <div class="nome_produto">
                        <?php
                        require("conexao.php");
                        $id = $_GET['pro_id'];
                        $query = "SELECT * FROM produto WHERE pro_id = '$id'";

                        $result_query = mysqli_query($conn, $query);
                        while ($ln = mysqli_fetch_assoc($result_query)) {
                            echo '<h1><b>' . $ln['pro_nome'] . '</b></h1>';
                        }
                        ?>

                    </div>
                    <div class="descricao">
                        <?php
                        require("conexao.php");
                        $id = $_GET['pro_id'];
                        $query = "SELECT * FROM produto WHERE pro_id = '$id'";

                        $result_query = mysqli_query($conn, $query);
                        while ($ln = mysqli_fetch_assoc($result_query)) {
                            echo '<p>' . $ln['pro_descricao'] . '</p>';
                        }
                        ?>

                    </div>
                    <div class="preco">
                        <?php
                        require("conexao.php");
                        $id = $_GET['pro_id'];
                        $query = "SELECT * FROM produto WHERE pro_id = '$id'";

                        $result_query = mysqli_query($conn, $query);
                        while ($ln = mysqli_fetch_assoc($result_query)) {
                            echo '<h1>R$' . number_format($ln['pro_valor'], 2, ',', '.') . '</h1>';
                        }
                        ?>

                    </div>
                    <div class="quant">
                        <span>
                            <label id="quant">Quantidade</label>
                            <input id="input" type="text" value="1"/>
                        </span>
                    </div>
                    <div class="comprar">
                        <?php
                        require("conexao.php");
                        $id = $_GET['pro_id'];
                        $query = "SELECT * FROM produto WHERE pro_id = '$id'";

                        $result_query = mysqli_query($conn, $query);
                        while ($ln = mysqli_fetch_assoc($result_query)) {
                            echo '<a href="Tela_carrinho.php?acao=add&pro_id='. $ln['pro_id']. '" class="bottom">COMPRAR</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
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