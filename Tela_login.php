<?php
ob_start();
require_once './php/classes.php';
$u = new usuario;
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
    <section class="account">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-10">
					<div class="account-contents" style="background: url('assets/img/about/about1.jpg'); background-size: cover;">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="account-thumb">
                                    <h2>Faça Login</h2>
                                  </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="account-content">
                                    <form action="" method="post">
                                        <div class="single-acc-field">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" placeholder="Digite seu E-mail" name="email" required>
                                        </div>
                                        <div class="single-acc-field">
                                            <label for="password">Senha</label>
                                            <input type="password" id="password" placeholder="Digite sua senha" name="senha" required>
                                        </div>
                                        <div class="single-acc-field boxes">
                                            <input type="checkbox" id="checkbox">
                                            <label for="checkbox">Lembrar</label>
                                        </div>
                                        <div class="single-acc-field">
                                            <button type="submit">Login</button>
                                        </div>
                                        <a href="Tela_recuperar_senha.php">Esqueceu a senha??</a>
                                        <a href="Tela_registrar.php">Ainda não tem conta?</a>
                                    </form>
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

    <?php
    if (isset($_POST['email'])) {
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        if (!empty($email) && !empty($senha)) {
            $u->conectar("banco_petshop", "localhost", "root", "");
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

<!-- index.html  03:25:08 GMT -->

</html>