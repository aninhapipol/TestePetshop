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
    <link rel="stylesheet" href="assets/css/Tela_produto_detalhes.css">

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
                                                echo '<a href="Tela_produtos.php?searchTipo=' . $ln['pro_tipo'] . '&searchSubtipo=*">' . $ln['pro_tipo'] . '</a>';
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

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.php">Inicio</a></li>
                            <?php

                            require("conexao.php");
                            $id = $_GET['pro_id'];
                            $query = "SELECT * FROM produto WHERE pro_id = '" . $id . "'";

                            $result_query = mysqli_query($conn, $query);
                            while ($ln = mysqli_fetch_assoc($result_query)) {
                                echo '<li><a href="Tela_produtos.php?searchTipo=' . $ln['pro_tipo'] . '&searchSubtipo=*">' . $ln['pro_tipo'] . '</a></li>';
                                echo '<li><a href="Tela_produtos.php?searchTipo=' . $ln['pro_tipo'] . '&searchSubtipo=' . $ln['pro_subtipo'] . '">' . $ln['pro_subtipo'] . '</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--product details start-->
    <div class="product_details mt-60 mb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product-details-tab">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <?php

                            require("conexao.php");
                            $id = $_GET['pro_id'];
                            $query = "SELECT * FROM produto WHERE pro_id = '" . $id . "'";

                            $result_query = mysqli_query($conn, $query);
                            while ($ln = mysqli_fetch_assoc($result_query)) {
                                echo '<a href="#"><img id="zoom1" src="assets/img/antigo/' . $ln['pro_foto'] . '" data-zoom-image="assets/img/antigo/' . $ln['pro_foto'] . '" alt="big-1"></a>';
                            }
                            ?>
                        </div>
                        <div class="single-zoom-thumb">
                            <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                <li>
                                    <?php

                                    require("conexao.php");
                                    $id = $_GET['pro_id'];
                                    $query = "SELECT * FROM produto WHERE pro_id = '" . $id . "'";

                                    $result_query = mysqli_query($conn, $query);
                                    while ($ln = mysqli_fetch_assoc($result_query)) {
                                        echo '<a href="#" class="elevatezoom-gallery active" data-update="" data-image="assets/img/antigo/' . $ln['pro_foto'] . '" data-zoom-image="assets/img/antigo/' . $ln['pro_foto'] . '">
                                        <img src="assets/img/antigo/' . $ln['pro_foto'] . '" alt="zo-th-1" />
                                    </a>';
                                    }
                                    ?>
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product_d_right">
                        <?php
                        require("conexao.php");
                        $id = $_GET['pro_id'];
                        $query = "SELECT * FROM produto WHERE pro_id = '$id'";

                        $result_query = mysqli_query($conn, $query);
                        while ($ln = mysqli_fetch_assoc($result_query)) {
                            echo '  <form action="Tela_carrinho.php?acao=add&pro_id=' . $ln['pro_id'] . '&associado=null" method="post">';
                        }
                        ?>
                        <?php
                        require("conexao.php");
                        $id = $_GET['pro_id'];
                        $query = "SELECT * FROM produto WHERE pro_id = '$id'";

                        $result_query = mysqli_query($conn, $query);
                        while ($ln = mysqli_fetch_assoc($result_query)) {
                            echo '<h1>' . $ln['pro_nome'] . '</h1>';

                            if ($ln['promocoes'] == "s") {
                                echo '<div class="price_box"><span class="current_price">R$ ' . number_format($ln['promoco_novo'], 2, ',', '.') . '</span><span class="old_price"> R$ ' . number_format($ln['pro_valor'], 2, ',', '.') . '</span></div>';
                            } else {
                                echo '<div class="price_box"><span class="current_price">R$' . number_format($ln['pro_valor'], 2, ',', '.') . '</span></div>';
                            }
                        }
                        ?>
                        <div class="product_desc">
                            <ul>
                                <li>Em Estoque</li>
                            </ul>
                            <?php
                            require("conexao.php");
                            $id = $_GET['pro_id'];
                            $query = "SELECT * FROM produto WHERE pro_id = '$id'";

                            $result_query = mysqli_query($conn, $query);
                            while ($ln = mysqli_fetch_assoc($result_query)) {
                                echo '<p>' . $ln['pro_descricaoR'] . '</p>';
                            }
                            ?>
                        </div>
                        <div class="product_variant quantity">
                            <label>Quantidade</label>
                            <input min="1" max="100" value="1" type="number">
                            <button class="button" type="submit">Adicionar Carrinho</button>
                        </div>
                        
                        </form>
                        <?php
                        require("conexao.php");
                        $id = $_GET['pro_id'];
                        $queryAssociado = "SELECT associado FROM produto WHERE pro_id = '$id'";
                        $result_queryAssociado = mysqli_query($conn, $queryAssociado);
                        $associado = mysqli_fetch_assoc($result_queryAssociado);

                        $query = "SELECT pro_id FROM produto WHERE pro_id = '$id'";
                        $result_query = mysqli_query($conn, $query);
                        while ($ln = mysqli_fetch_assoc($result_query)) {
                            echo '  <form action=Tela_carrinho.php?acao=add&pro_id='. $ln['pro_id']. '&associado='. $associado['associado'] .'" method="post">';
                        }
                        ?>
                        <div class="product_variant quantity" id="botao2">
                            
                        <button class="button" type="submit">Produto + Sugestão</button>
                        </div>
                        
                        </form>
                        <div class="priduct_social">
                            <ul>
                                <li><a class="facebook" href="#" title="facebook"><i class="fa fa-facebook"></i> Like</a></li>
                                <li><a class="twitter" href="#" title="twitter"><i class="fa fa-twitter"></i> tweet</a></li>
                                <li><a class="pinterest" href="#" title="pinterest"><i class="fa fa-pinterest"></i> save</a></li>
                                <li><a class="google-plus" href="#" title="google +"><i class="fa fa-google-plus"></i> share</a></li>
                                <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i> linked</a></li>
                            </ul>
                        </div>
                        <div class="divMais">
                            <h1 id="mais">+</h1>
                        </div>
                        <div class="associado">
                            <?php
                            require("conexao.php");
                            $id = $_GET['pro_id'];
                            $queryAssociado = "SELECT associado FROM produto WHERE pro_id = '$id'";
                            $result_queryAssociado = mysqli_query($conn, $queryAssociado);
                            $associado = mysqli_fetch_assoc($result_queryAssociado);

                            $query = "SELECT pro_foto, pro_id FROM produto WHERE pro_id = (SELECT associado FROM `produto` WHERE pro_id = '$id')";
                            $result_query = mysqli_query($conn, $query);
                            while ($ln = mysqli_fetch_assoc($result_query)) {
                                echo '<a href="Tela_produtos_detalhes.php?pro_id=' . $associado['associado'] . '"><img id="imagemAssociado" src="assets/img/antigo/' . $ln['pro_foto'] . '"></a>';
                            }
                            ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product details end-->

    <!--product info start-->
    <div class="product_d_info mb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_d_inner">
                        <div class="product_info_button">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Descrição</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Avaliações</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info" role="tabpanel">
                                <div class="product_info_content">
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
                            </div>


                            <div class="tab-pane fade" id="reviews" role="tabpanel">
                                <div class="reviews_wrapper">
                                    <h2>0 Avaliações</h2>

                                    <div class="comment_title">
                                        <h2>Adicione uma avaliação</h2>
                                        <p>Seu e-mail não será publicado. Os campos obrigatórios estão marcados.</p>
                                    </div>
                                    <div class="product_ratting mb-10">
                                        <h3>Nota</h3>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product_review_form">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="review_comment">Comentários </label>
                                                    <textarea name="comment" id="review_comment"></textarea>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="author">Nome</label>
                                                    <input id="author" type="text">

                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="email">Email </label>
                                                    <input id="email" type="text">
                                                </div>
                                            </div>
                                            <?php
                                            require("conexao.php");
                                            $id = $_GET['pro_id'];
                                            $query = "SELECT * FROM produto WHERE pro_id = '$id'";

                                            $result_query = mysqli_query($conn, $query);
                                            while ($ln = mysqli_fetch_assoc($result_query)) {
                                                echo '<a type="sub" href="Tela_carrinho.php?acao=add&pro_id=' . $ln['pro_id'] . '&associado=null" class="bottom">Comprar</a>';
                                            }
                                            ?>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product info end-->
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