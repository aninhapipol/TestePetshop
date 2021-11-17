<?php
require_once 'php/classes.php';
$u = new usuario;
session_start();
if (!isset($_SESSION['cli_id'])) {
    header("location: Tela_login.php");
    exit;
} 
?>
<!doctype html>
<html class="no-js" lang="en">

<!-- index.php  -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dog Tech</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- icone da guia -->
    <link rel="shortcut icon" href="assets/img/icoAba.ico">

    <!-- CSS 
    ========================= -->


    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/css/plugins_usuarios.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/Tela_usuario_CSS.css">

</head>

<body>

    <!--CABEÇHALO 1 COMEÇO-->
    <header>
        <div class="header_middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-6">
                        <div class="logo">
                            <a href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-6">
                        <div class="middel_right">
                            <!--PESQUISA-->
                            <div class="search_container">
                                <form action="pesquisa.php" method="post">
                                    <div class="search_box">
                                        <input id="texto" type="text" name="search" placeholder="Faça uma pesquisa" />
                                        <button id="search-button" type="submit"><span>Buscar</span></button>
                                    </div>
                                </form>
                            </div>

                            <!--USUARIO-->
                            <div class="middel_right_info">
                                <div class="header_wishlist">
                                    <a href="Tela_login.php"><img src="assets/img/user.png" alt=""></a>
                                </div>
                                <!--CARRINHO-->
                                <div class="mini_cart_wrapper">
                                    <a href="Tela_carrinho.php" target="_self">
                                        <img src="assets/img/shopping-bag.png">
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header middel end-->
        <!--header bottom satrt-->
        <div class="main_menu_area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="main_menu menu_position">
                            <nav>
                                <ul>
                                    <li><a href="index.php">Inicio</a></li>

                                    <li><a class="active" href="#">Departamentos<i class="fa fa-angle-down"></i></a>
                                        <ul class="sub_menu pages">
                                        <li>
                                            <?php
                                            echo '<li>';
                                            echo '<a href="Tela_produtos.php?searchTipo=*&searchSubtipo=*">Geral</a>';
                                            echo '</li>';
                                            ?>
                                        </li>
                                            <?php
                                            require("conexao.php");


                                            $query = "SELECT pro_tipo,pro_subtipo, COUNT(pro_tipo) AS quantidade FROM produto GROUP BY pro_tipo";
                                            $result_query = mysqli_query($conn, $query);
                                            while ($ln = mysqli_fetch_assoc($result_query)) {
                                                echo '<li>';
                                                echo '<a href="Tela_produtos.php?searchTipo='.$ln['pro_tipo'].'&searchSubtipo=*">' . $ln['pro_tipo'] . '</a>';
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                    <li><a href="Tela_produtos.php?searchTipo=promocoes&searchSubtipo=*">PROMOÇÕES</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header bottom end-->
    </header>
    <!--CABEÇALHO 1 FINAL-->

    <!-- CONTEUDO COMEÇO-->

    <section class="account">
		<div class="container">
			<div class="row justify-content-center">
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
				<div class="col-lg-10">
					<div class="account-contents" style="background: url('assets/img/about/'); background-size: cover;">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="account-thumb">
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
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="account-content">
                                <h4>Animal</h4>
                        
                        <?php

                        require("conexao.php");

                        $query = "SELECT * FROM cliente WHERE cli_id = $_SESSION[cli_id]";
                        $result_query = mysqli_query($conn, $query);
                        //$animal = $query['cli_animal'];
                        while ($ln = mysqli_fetch_assoc($result_query)) {
                            if ($ln['cli_animal'] == 'Felino') {
                                echo "<td>";
                                include 'felino.php';
                                echo "</td>";
                            } else if ($ln['cli_animal'] == 'Canino') {
                                echo "<td>";
                                include 'canino.php';
                                echo "</td>";
                            } else {
                                echo "<td>";
                                include 'roedor.php';
                                echo "</td>";
                            }
                        }
                        ?>
						 <center>
            <div class="content">
		                <a id="sugestao" href="#abrirModal" class="bottom">Sugestação</a>
                <div id="abrirModal" class="modal">
                    <a href="#fechar" title="Fechar" class="fechar">x</a>
                    <h2 >Bem Vindo a Sugestão</h2>
                   
                    <p>Qual o máximo que quer gastar?</p>
                    <div id="sugestaoPesquisa">
                        <form id="pesquisaSugestao" method="post" name="form1" onsubmit="return validar_campos()">
                        <input id="textoSugestao" type="number" class="custo" size="1" name="custo" />
                        <!--<button id="submitSugestao" type="submit"><span>Buscar</span></button>-->
                        <?php                     
                        if(isset($_POST['custo'])){
                            $valorParaGastar = $_POST['custo'];
                            $idCliente = intval($_SESSION['cli_id']);

                            $u->conectar("banco_petshop", "localhost", "root", "");
                            $u->cadastrarPrecoSugerido($valorParaGastar, $idCliente);

                            //criamos o arquivo
                            $arquivo = fopen('idCliente.txt','w');
                            if ($arquivo == false) die('Não foi possível criar o arquivo.');
                            fwrite($arquivo, $idCliente);
                            //Fechamos o arquivo após escrever nele
                            fclose($arquivo);
                            $comando = escapeshellcmd('testeCombination.py');
                            $cmdResult = shell_exec($comando);  
                        }
                        ?>
                        </form>
                    </div>
                    <form method="post" >
                        <!--<p><input id="submit-btn" type="submit" value="Aperte Aqui Para Vizualizar"/></p>-->
                        <center>
                            <section class="products-list">
                                <?php
                                   
                                    require("conexao.php");
                                    $cli_id = intval($_SESSION['cli_id']);
                                    $query = "SELECT * FROM cliente WHERE cli_id = '$cli_id'";
                                    $qr = mysqli_query($conn, $query);
                                    $ln = mysqli_fetch_assoc($qr);
                                    $cli_resSugestao = $ln['cli_resSugestao'];
                                    $array = explode(',', $cli_resSugestao);
                                    $cli_precoSugerido = $ln['cli_precoSugerido'];

                                    $custo = 0;
                                    $total = 0;
                                    if ($cli_precoSugerido == ""){
                                        echo '<h3 id="semSugestao">Nenhuma Sugestão Ainda<h3>';
                                    } elseif ($cli_resSugestao == ""){
                                        echo '<h3 id="semSugestao2">Valor Muito Baixo<h3>';
                                    }else{
                                        foreach ($array as $values) {
                                            $queryProduto = "SELECT * FROM produto WHERE pro_id = '$values'";
                                            $qrProduto = mysqli_query($conn, $queryProduto);
                                            $lnProduto = mysqli_fetch_assoc($qrProduto);
                                            $nome = $lnProduto['pro_nome'];
                                            $foto = $lnProduto['pro_foto'];
                                            $preco = number_format($lnProduto['pro_valor'], 2, ',', '.');
                                            $custo = $custo + $lnProduto['pro_valor'];

                                            echo '<div class="product-item" >';
                                            echo '<img src="imagens/'.$foto.'" />';
                                            #echo '<h4>' . $nome . '</h4>';
                                            echo ' <div class="preco"><a href="Tela_produtos_detalhes.php?pro_id=' . $values . '">R$' .$preco . '</a></div>';
                                            echo '</div>';
                                            #echo '<div>     
                                            #<td><a href="#"><img id="imagens_pequenas"  class="imagens_pequenas1" src="imagens/' . $foto . '"></a>
                                            #<h3 id="preco">R$ ' . $preco . '</h3></div>';
                                            
                                        }
                                    }
                                ?>
                            
                            </section>
                        </center>
                    </form>
                    <div class="modalB">
                    <h3>Orçamento: R$<?php echo  number_format($cli_precoSugerido, 2, ',', '.');?></h3>
                    <h3>Custo Total: R$<?php echo number_format($custo, 2, ',', '.'); ?></h3>
                    <div>
                    <div class="comprar">
                        <?php
                        echo '<a href="Tela_carrinho.php?acao=add&associado=sugestao&cli_id='.$cli_id.'" class="bottom">COMPRAR SUGESTÃO</a>';
                        ?>
                    </div>
                    </div>
					</div>
        </center>
                    <button class="col-xl-6 col-lg-6 col-md-6 col-sm-12" onclick="window.location.href = 'php/sair.php'">Sair</button>

               
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
		

	</section>
    		
    
    <!-- CONTEUDO FIM-->




    <!--RODAPE COMEÇO-->
    <footer class="footer_widgets">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="widgets_container contact_us">
                            <div class="footer_logo">
                                <a href="#"><img src="assets/img/logo/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="footer_contact">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.3289553029376!2d-46.661002885905596!3d-23.556626184685214!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce58348d040de7%3A0x3faa367cc3f3edd1!2sFAM%20-%20Campus%20Paulista!5e0!3m2!1spt-BR!2sbr!4v1588950577330!5m2!1spt-BR!2sbr" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" class="mapa">
                            </iframe>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3>Informações</h3>
                            <div class="footer_menu">
                                <ul>
                                    <li><a href="#">Sobre nós</a></li>
                                    <li><a href="#">Politica de Privacidade</a></li>
                                    <li><a href="#">Perguntas Frequentes</a></li>
                                    <li><a href="#">Retornar</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3>Contato</h3>
                            <div class="footer_menu">
                                <ul>
                                    <li>(11) 98568-5522</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="widgets_container newsletter">
                            <h3>Nos veja em :)</h3>
                            <div class="footer_social_link">
                                <ul>
                                    <li><a class="facebook" href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="twitter" href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="instagram" href="#" title="instagram"><i class="fa fa-instagram"></i></a></li>
                                    <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a class="rss" href="#" title="rss"><i class="fa fa-rss"></i></a></li>
                                </ul>
                            </div>
                            <div class="subscribe_form">
                                <h3>Receba atualizações</h3>
                                <form id="mc-form" class="mc-form footer-newsletter">
                                    <input id="mc-email" type="email" autocomplete="off" placeholder="Your email address..." />
                                    <button id="mc-submit">Subscribe!</button>
                                </form>
                                <!-- mailchimp-alerts Start -->
                                <div class="mailchimp-alerts text-centre">
                                    <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                    <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                    <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                                </div><!-- mailchimp-alerts end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>

    <!--RODAPE FINAL-->



    <!--footer area end-->
    <!-- JS
    ============================================ -->


    <!-- Plugins JS -->
    <script src="assets/js/plugins.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>



</body>

<!-- index.html  03:25:08 GMT -->

</html>