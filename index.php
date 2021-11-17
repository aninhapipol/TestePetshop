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
    <link rel="stylesheet" href="assets/css/plugins.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/Tela_index.css">

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


    <!--SLIDER COMEÇO-->
    <section class="slider_section d-flex align-items-center" data-bgimg="assets/img/slider/slider3.jpg">
        <div class="slider_area owl-carousel">
            <div class="single_slider d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <div class="slider_content">
                                <h1>Coleira Pawise</h1>
                                <h2>Para todos os tipos de gato</h2>
                                <a class="button" href="product-details.html">Comprar</a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="slider_content">
                                <img src="assets/img/product/1.png" alt="" style="width: 65%; margin-top: 5%">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="single_slider d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <div class="slider_content">
                                <h1>Gaiola Animal!</h1>
                                <h2>Ideal para seu hamster radical</h2>
                                <a class="button" href="product-details.html">Comprar</a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="slider_content">
                                <img src="assets/img/product/2.png" alt="" style="width: 75%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <div class="slider_content">
                                <h1>Ração Golden</h1>
                                <h2>A ração que é ouro</h2>
                                <a class="button" href="product-details.html">Comprar</a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="slider_content">
                                <img src="assets/img/product/3.png" alt="" style="width: 65%; margin-top: 5%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--SLIDER FINAL-->

    <div class="content">
        <center>
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
                <img id="qrCodeImagem" src="assets/img/antigo/QR_code.png" style="width: 8%;">

            </div>

            <h1>Top produtos mais comprados</h1>
            <div class="container_conteudo">

                <div id="box-1" class="box">
                    <?php
                    require("conexao.php");

                    $query = "SELECT * FROM produto ORDER BY pro_clique DESC LIMIT 0, 1";
                    $result_query = mysqli_query($conn, $query);
                    while ($ln = mysqli_fetch_assoc($result_query)) {
                        echo '<img src="assets/img/antigo/' . $ln['pro_foto'] . '" />';
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
                        echo '<img src="assets/img/antigo/' . $ln['pro_foto'] . '" />';
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
                        echo '<img src="assets/img/antigo/' . $ln['pro_foto'] . '" />';
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
                        echo '<img src="assets/img/antigo/' . $ln['pro_foto'] . '" />';
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
                        echo '<img src="assets/img/antigo/' . $ln['pro_foto'] . '" />';
                        echo '<h4>' . $ln['pro_nome'] . '</h4>';
                        echo ' <div class="preco"><a href="Tela_produtos_detalhes.php?pro_id=' . $ln['pro_id'] . '">R$' . number_format($ln['pro_valor'], 2, ',', '.') . '</a></div>';
                    }
                    ?>
                </div>

        </center>
    </div>
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