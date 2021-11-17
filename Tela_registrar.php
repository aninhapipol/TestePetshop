<?php
require_once 'php/classes.php';
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
                                    <h2>Faça seu cadastro</h2>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="account-content">
                                    <form action="" method="post">
                                        <div class="single-acc-field">
                                            <label for="nome"><b>Nome Completo</b></label>
                                            <input type="text" placeholder="Digite seu Nome Completo" name="nome" maxlength="30" required>
                                        </div>
                                        <div class="single-acc-field">
                                            <label for="cpf"><b>CPF</b></label>
                                            <input type="text" placeholder="Digite seu CPF" name="cpf" maxlength="11" required>
                                        </div>
                                        <div class="single-acc-field">
                                            <label for="nascimento"><b>Data de Nascimento</b></label>
                                            <input type="date" placeholder="Data de Nascimento" name="nascimento" required>
                                        </div>
                                        <div class="single-acc-field">
                                            <label for="cep"><b>CEP</b></label>
                                            <input type="text" placeholder="Digite seu CEP" name="cep" maxlength="9" required>
                                        </div>
                                        <div class="single-acc-field">
                                            <label for="end"><b>Endereço</b></label>
                                            <input type="text" placeholder="Digite seu Endereço" name="endereco" maxlength="60" required>
                                        </div>
                                        <div class="single-acc-field">
                                            <label for="cidade"><b>Cidade</b></label>
                                            <input type="text" placeholder="Digite sua cidade" name="cidade" maxlength="30" required>
                                        </div>
                                        <div class="single-acc-field">
                                            <label for="estado"><b>Estado</b></label>
                                            <select id="estado" name="estado">
                                                <option value="AC">AC</option>
                                                <option value="AL">AL</option>
                                                <option value="AP">AP</option>
                                                <option value="AM">AM</option>
                                                <option value="BA">BA</option>
                                                <option value="CE">CE</option>
                                                <option value="DF">DF</option>
                                                <option value="ES">ES</option>
                                                <option value="GO">GO</option>
                                                <option value="MA">MA</option>
                                                <option value="MT">MT</option>
                                                <option value="MS">MS</option>
                                                <option value="MG">MG</option>
                                                <option value="PA">PA</option>
                                                <option value="PB">PB</option>
                                                <option value="PR">PR</option>
                                                <option value="PE">PE</option>
                                                <option value="PI">PI</option>
                                                <option value="RJ">RJ</option>
                                                <option value="RN">RN</option>
                                                <option value="RS">RS</option>
                                                <option value="RO">RO</option>
                                                <option value="RR">RR</option>
                                                <option value="SC">SC</option>
                                                <option value="SP">SP</option>
                                                <option value="SE">SE</option>
                                                <option value="TO">TO</option>
                                            </select>
                                        </div>
                                        <div class="single-acc-field boxes">
                                            <label for="animal"><b>Tipo de Animal</b></label>
                                            <select id="animal" name="animal">
                                                <option value="Felino">Felino</option>
                                                <option value="Canino">Canino</option>
                                                <option value="Roedor">Roedor</option>
                                            </select>
                                        </div>
                                        <div class="single-acc-field">
                                            <label for="email"><b>E-mail</b></label>
                                            <input type="text" placeholder="Digite seu E-mail" name="email" maxlength="40" required>
                                        </div>

                                        <div class="single-acc-field">
                                            <label for="senha"><b>Senha</b></label>
                                            <input type="password" placeholder="Digite sua senha" name="senha" maxlength="15" required>
                                        </div>

                                        <div class="single-acc-field">
                                            <label for="rsenha"><b>Repetir Senha</b></label>
                                            <input type="password" placeholder="Repita sua senha" name="rsenha" maxlength="15" required>
                                        </div>
                                        <div class="single-acc-field">
                                            <button type="submit">Registrar</button>
                                        </div>
                                        <a href="Tela_login.php">Já possui conta? Login</a>
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

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$nascimento = $_POST['nascimento'];
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$animal = $_POST['animal'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$rsenha = $_POST['rsenha'];
$connect = mysqli_connect('localhost','root','','banco_petshop');
//$db = mysqli_select_db('id15361524_banco_petshop');
$query_select = "SELECT cli_email FROM cliente WHERE cli_email = '$email'";
$select = mysqli_query($connect, $query_select);
$array = mysqli_fetch_array($select);
$logarray = $array['email'];


  if($email == "" || $email == null){
    echo"<script language='javascript' type='text/javascript'>
    alert('O campo email deve ser preenchido');window.location.href='
    Tela_registrar.php';</script>";

    }else{
      if($logarray == $email){

        echo"<script language='javascript' type='text/javascript'>
        alert('Esse email já existe');window.location.href='
        Tela_registrar.php';</script>";
        die();

      }else if($senha !== $rsenha){
        echo"<script language='javascript' type='text/javascript'>
        alert('Senhas não correspondem');window.location.href='
        Tela_registrar.php';</script>";
        die();
          
      }else{
        $query = "INSERT INTO cliente (cli_nome, cli_cpf, cli_nasci, cli_cep, cli_end, cli_cidade, cli_estado, cli_animal, cli_email, cli_senha) VALUES ('$nome','$cpf','$nascimento','$cep','$endereco','$cidade','$estado','$animal','$email','$senha')";
        $insert = mysqli_query($connect,$query);

        if($insert){
          echo"<script language='javascript' type='text/javascript'>
          alert('Usuário cadastrado com sucesso!');window.location.
          href='Tela_login.php'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>
          alert('Não foi possível cadastrar esse usuário');</script>";
        }
      }
    }
?>

</body>

<!-- index.html  03:25:08 GMT -->

</html>