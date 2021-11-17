<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Point do Pet</title>
    
    <link rel="stylesheet" href="css/Tela_index.css">
    <link rel="stylesheet" href="css/Tela_index_CSS.css">
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
    <div class="content">
      <center>
        <div class="slideshow-container">
          <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="imagens/banner_1.jpg" style="width:100%">
          </div>

          <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="imagens/banner_3.jpg" style="width:100%">
          </div>

          <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="imagens/banner_2.jpg" style="width:100%">
          </div>

          <!-- Next and previous buttons -->
          <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
          <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>
          <!-- The dots/circles -->
        <div class="dotSlide" style="text-align:center">
          <span class="dot" onclick="currentSlide(1)"></span>
          <span class="dot" onclick="currentSlide(2)"></span>
          <span class="dot" onclick="currentSlide(3)"></span>
        </div>

        <div id="conteudo-principal">
           <h1>Dog Tech - Tudo para seu animal</h1>

          <p>
              A Dog Tech já inicia suas atividades por meio de uma loja virtual onde estão instaladas as estruturas para um excelente atendimento ao cliente.
              Sempre atenta ao crescimento do mercado animal e ao canal de compras virtuais, buscamos integrar as ações e facilitar a interação com o nossos clientes, nosso bem mais precioso.
              O intuito da empresa é desenvolver um portal altamente acolhedor e de fácil acesso para que nossos clientes encontrem os materiais desejados com preços acessíveis.

          </p>

          <h2>Missão</h2>

          <p>
              Fornecer todos os itens para o cuidado do seu animal de maneira prática e facilitada com foco em Felinos, Caninos e roedores. 
              Experimente e se Supreenda ;).
          </p>
        </div>

        <div id="qrCode">
        <h1>Baixe Nosso App</h1>
        <img id="qrCodeImagem" src="imagens/QR_code.png" style="width: 8%;">
        
        </div>

        <h1>Top produtos mais comprados</h1>
        <div class="container">
    
          <div id="box-1" class="box">
            <?php
            require("conexao.php");

            $query = "SELECT * FROM produto ORDER BY pro_clique DESC LIMIT 0, 1";
            $result_query = mysqli_query($conn, $query);
            while ($ln = mysqli_fetch_assoc($result_query)) {
              echo '<img src="imagens/' . $ln['pro_foto'] . '" />';
              echo '<h4>' . $ln['pro_nome'] . '</h4>';
              echo ' <div class="preco"><a href="Tela_produtos_detalhes.php?pro_id=' . $ln['pro_id'] . '">R$' . number_format($ln['pro_valor'], 2, ',', '.') . '</a></div>';
            }
            ?>
          </div>
          

          <div id="box-2" class="box">
            <?php
            require("conexao.php");

            $query = "SELECT * FROM produto ORDER BY pro_clique DESC LIMIT 1, 1";
            $result_query = mysqli_query($conn, $query);
            while ($ln = mysqli_fetch_assoc($result_query)) {
              echo '<img src="imagens/' . $ln['pro_foto'] . '" />';
              echo '<h4>' . $ln['pro_nome'] . '</h4>';
              echo ' <div class="preco"><a href="Tela_produtos_detalhes.php?pro_id=' . $ln['pro_id'] . '">R$' . number_format($ln['pro_valor'], 2, ',', '.') . '</a></div>';
            }
            ?>
          </div>

          <div id="box-3" class="box">
            <?php
            require("conexao.php");

            $query = "SELECT * FROM produto ORDER BY pro_clique DESC LIMIT 2, 1";
            $result_query = mysqli_query($conn, $query);
            while ($ln = mysqli_fetch_assoc($result_query)) {
              echo '<img src="imagens/' . $ln['pro_foto'] . '" />';
              echo '<h4>' . $ln['pro_nome'] . '</h4>';
              echo ' <div class="preco"><a href="Tela_produtos_detalhes.php?pro_id=' . $ln['pro_id'] . '">R$' . number_format($ln['pro_valor'], 2, ',', '.') . '</a></div>';
            }
            ?>
          </div>

          <div id="box-4" class="box">
            <?php
            require("conexao.php");

            $query = "SELECT * FROM produto ORDER BY pro_clique DESC LIMIT 3, 1";
            $result_query = mysqli_query($conn, $query);
            while ($ln = mysqli_fetch_assoc($result_query)) {
              echo '<img src="imagens/' . $ln['pro_foto'] . '" />';
              echo '<h4>' . $ln['pro_nome'] . '</h4>';
              echo ' <div class="preco"><a href="Tela_produtos_detalhes.php?pro_id=' . $ln['pro_id'] . '">R$' . number_format($ln['pro_valor'], 2, ',', '.') . '</a></div>';
            }
            ?>
          </div>

          <div id="box-5" class="box">
            <?php
            require("conexao.php");

            $query = "SELECT * FROM produto ORDER BY pro_clique DESC LIMIT 4, 1";
            $result_query = mysqli_query($conn, $query);
            while ($ln = mysqli_fetch_assoc($result_query)) {
              echo '<img src="imagens/' . $ln['pro_foto'] . '" />';
              echo '<h4>' . $ln['pro_nome'] . '</h4>';
              echo ' <div class="preco"><a href="Tela_produtos_detalhes.php?pro_id=' . $ln['pro_id'] . '">R$' . number_format($ln['pro_valor'], 2, ',', '.') . '</a></div>';
            }
            ?>
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

      <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
          showSlides(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n) {
          showSlides(slideIndex = n);
        }

        function showSlides(n) {
          var i;
          var slides = document.getElementsByClassName("mySlides");
          var dots = document.getElementsByClassName("dot");
          if (n > slides.length) {slideIndex = 1}
          if (n < 1) {slideIndex = slides.length}
          for (i = 0; i < slides.length; i++) {
              slides[i].style.display = "none";
          }
          for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";
          dots[slideIndex-1].className += " active";
        }
      </script>
    </div>
  </body>
</html>