<?php
require_once 'php/classes.php';
$u = new usuario;
session_start();
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}

//adiciona produto
if (isset($_GET['acao'])) {

    //ADICIONAR CARRINHO
    if ($_GET['acao'] == 'add') {
        if ($_GET['associado'] == 'null') {
            $pro_id = intval($_GET['pro_id']);
            if (!isset($_SESSION['carrinho'][$pro_id])) {
                $_SESSION['carrinho'][$pro_id] = 1;
            } else {
                $_SESSION['carrinho'][$pro_id] += 1;
            }
        } elseif ($_GET['associado'] == 'sugestao') {
            require("conexao.php");
            $cli_id = ($_GET['cli_id']);
            $query = "SELECT * FROM cliente WHERE cli_id = '$cli_id'";
            $qr = mysqli_query($conn, $query);
            $ln = mysqli_fetch_assoc($qr);
            $cli_resSugestao = $ln['cli_resSugestao'];
            $array = explode(',', $cli_resSugestao);
            foreach ($array as $values) {
                if (!isset($_SESSION['carrinho'][$values])) {
                    $_SESSION['carrinho'][$values] = 1;
                } else {
                    $_SESSION['carrinho'][$values] += 1;
                }
            }
        } else {
            $idProd =  intval($_GET['pro_id']);
            $associado =  intval($_GET['associado']);
            $ids = array($idProd, $associado);
            foreach ($ids as $value) {
                $pro_id = $value;
                if (!isset($_SESSION['carrinho'][$pro_id])) {
                    $_SESSION['carrinho'][$pro_id] = 1;
                } else {
                    $_SESSION['carrinho'][$pro_id] += 1;
                }
            }
        }
    }

    //REMOVER CARRINHO

    if ($_GET['acao'] == 'del') {
        $pro_id = intval($_GET['pro_id']);
        if (isset($_SESSION['carrinho'][$pro_id])) {
            unset($_SESSION['carrinho'][$pro_id]);
        }
    } //ALTERAR QUANTIDADE
    if ($_GET['acao'] == 'up') {
        if (is_array($_POST['prod'])) {
            foreach ($_POST['prod'] as $pro_id => $qtd) {
                $pro_id = intval($pro_id);
                $qtd = intval($qtd);
                if (!empty($qtd) || $qtd <> 0) {
                    $_SESSION['carrinho'][$pro_id] = $qtd;
                } else {
                    unset($_SESSION['carrinho'][$pro_id]);
                }
            }
        }
    }
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
    <link rel="stylesheet" href="assets/css/plugins.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/Tela_carrinho.css">

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
                            <li>Carrinho</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--shopping cart area start -->
    <div class="shopping_cart_area mt-60">
        <div class="container">
            <form action="?acao=up" method="post">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product_thumb">Foto</th>
                                            <th class="product_name">Produto</th>
                                            <th class="product-price">Valor</th>
                                            <th class="product_quantity">Quantidade</th>
                                            <th class="product_total">Total</th>
                                            <th class="product_remove">Remover</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (count($_SESSION['carrinho']) == 0) {
                                            echo '
                                <tr>
                                <td colspan="5">Não há produto no carrinho</td>
                                </tr>
                                ';
                                        } else {
                                            require("conexao.php");
                                            $total = 0;
                                            $subTotal = 0;

                                            foreach ($_SESSION['carrinho'] as $pro_id => $qtd) {
                                                $query = "SELECT * FROM produto WHERE pro_id = '$pro_id'";
                                                $qr = mysqli_query($conn, $query);
                                                $ln = mysqli_fetch_assoc($qr);
                                                $desc = $ln['pro_descricao'];
                                                $nome = $ln['pro_nome'];
                                                $preco = number_format($ln['pro_valor'], 2, ',', '.');
                                                $sub = number_format($ln['pro_valor'] * $qtd, 2, ',', '.');
                                                $sub2 = $ln['pro_valor'] * $qtd;
                                                $subTotal += $sub2;
                                                $frete = "10,00";
                                                $total += $ln['pro_valor'] * $qtd;
                                                echo '
                                <tr>
                                <td class="product_thumb"><a href="#"><img src="assets/img/antigo/' . $ln['pro_foto'] . '" alt=""></a></td>
                                <td class="product_name"><a href="Tela_produtos_detalhes.php?pro_id=' . $pro_id . '">' . $nome . '</a></td>
                                <td class="product-price">R$ ' . $preco . '</td>
                                <td class="product_quantity"><input min="1" max="100" type="number" name="prod[' . $pro_id . ']" value="' . $qtd . '" /></td>
                                <td class="product_total">R$ ' . $sub . '</td>
                                <td "product_remove"><a href="?acao=del&pro_id=' . $pro_id . '"><i class="ion-android-close"></i></a></td>
                                </tr>';
                                            }
                                            $total = $total + 10;
                                            $total = number_format($total, 2, ',', '.');
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="cart_submit">
                                <button type="submit"><a href="Tela_produtos.php?searchTipo=*&searchSubtipo=*">Procurar produtos</a></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area start-->
                <div class="coupon_area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code left">
                                <h3>Cupom</h3>
                                <div class="coupon_inner">
                                    <p>Entre com um cupom, caso tenha um.</p>
                                    <input placeholder="Coupon code" type="text">
                                    <button type="submit">Coleque o cupom</button>
                                </div>
                            </div>
                        </div>
            </form>
            <div class="col-lg-6 col-md-6">
                <div class="coupon_code right">
                    <h3>Total</h3>
                    <div class="coupon_inner">
                        <div class="cart_subtotal">
                            <p>Frete</p>
                            <p class="cart_amount">
                                <?php
                                if (!isset($frete)) {
                                    $frete = 0;
                                    echo $frete;
                                } else {
                                    echo $frete;
                                }
                                ?>
                            </p>
                        </div>
                        <div class="cart_subtotal ">
                            <p>Total á pagar</p>
                            <p class="cart_amount"><span></span>
                                <?php
                                if (!isset($subTotal)) {
                                    $subTotal = 0;
                                    echo $subTotal;
                                } else {
                                    echo number_format($subTotal, 2, ',', '.');
                                }
                                ?>
                            </p>
                        </div>

                        <div class="cart_subtotal">
                            <p>Total</p>
                            <p class="cart_amount">
                                <?php
                                if (!isset($total)) {
                                    $total = 0;
                                    echo $total;
                                } else {
                                    echo $total;
                                }
                                ?>
                            </p>
                        </div>

                        <div class="checkout_btn">
                            <form class="pagseguro" target="pagseguro" method="post" action="https://pagseguro.uol.com.br/checkout/checkout.jhtml">
                                <input type="hidden" name="email_cobranca" value="aninha.pipol@gmail.com" />
                                <input type="hidden" name="tipo" value="CP" />
                                <input type="hidden" name="moeda" value="BRL" />
                                <?php
                                require("conexao.php");

                                $total = 0;
                                $i = 1;
                                $idProduto = "";
                                foreach ($_SESSION['carrinho'] as $pro_id => $qtd) {
                                    $query = "SELECT * FROM produto WHERE pro_id = '$pro_id'";
                                    $qr = mysqli_query($conn, $query);
                                    $ln = mysqli_fetch_assoc($qr);
                                    $nome = $ln['pro_nome'];
                                    $preco = number_format($ln['pro_valor'], 2, ',', '.');
                                    $sub = number_format($ln['pro_valor'] * $qtd, 2, ',', '.');
                                    $total += $ln['pro_valor'] * $qtd;

                                    echo '<input type="hidden" name="item_id_' . $i . '" value="' . $pro_id . '" />
                                            <input type="hidden" name="item_descr_' . $i . '" value="' . $nome . '"/>
                                            <input type="hidden" name="item_quant_' . $i . '" value="' . $qtd . '" />
                                            <input type="hidden" name="item_valor_' . $i . '" value="' . $preco . '" />
                                            <input type="hidden" name="item_frete_1" value="500">
                                            <input type="hidden" name="frete" value="EN"/>';
                                    $idProduto .=  $pro_id . ",";
                                    $i += 1;
                                }

                                ?>
                               
                                <input type="hidden" name="peso" value="0" />
                                <input type="submit" name="submit" value="Ir para Pagamento" class="comprar" />
                            </form>
                            <?php
                            $idProdutoModificado = rtrim($idProduto, ",");
                            $u->conectar("banco_petshop", "localhost", "root", "");
                            $u->cadastrarTransacoes($idProdutoModificado);
                            ?>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--coupon code area end-->


    </div>

    </div>

    <!--shopping cart area end -->

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