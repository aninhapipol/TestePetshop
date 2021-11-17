<?php
session_start();
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}
//adiciona produto
if (isset($_GET['acao'])) {

    //ADICIONAR CARRINHO
    if ($_GET['acao'] == 'add') {
        $pro_id = intval($_GET['pro_id']);
        if (!isset($_SESSION['carrinho'][$pro_id])) {
            $_SESSION['carrinho'][$pro_id] = 1;
        } else {
            $_SESSION['carrinho'][$pro_id] += 1;
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
<!DOCTYPE html>
<html>

<head>
    <link href="css/Tela_index.css" rel="stylesheet">
    <link href="css/Tela_carrinho.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="_css/style.css">
    <meta charset="UTF-8">
    <title>Carrinho de Compras</title>
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


        <!-- Conteudo-->
        <center>
            <div class="content">
                <table>
                    <caption style="font-size: 45px;">Carrinho de Compras</caption>
                    <thead>
                        <tr>
                            <th width="244" class="tituloColunas">Produto</th>
                            <th width="79" class="tituloColunas">Quantidade</th>
                            <th width="89" class="tituloColunas">Pre&ccedil;o</th>
                            <th width="100" class="tituloColunas">SubTotal</th>
                            <th width="64" class="tituloColunas">Remover</th>
                        </tr>
                    </thead>
                    <form action="?acao=up" method="post">
                        <tfoot>
                            <tr>
                                <td colspan="5"><input type="submit" class="atualizar" value="Atualizar Carrinho" /></td>
                            <tr>
                                <td colspan="5"><a class="voltar" href="Tela_produtos.php">Continuar Comprando</a></td>
                            </tr>
                        </tfoot>
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
                                foreach ($_SESSION['carrinho'] as $pro_id => $qtd) {
                                    $query = "SELECT * FROM produto WHERE pro_id = '$pro_id'";
                                    $qr = mysqli_query($conn, $query);
                                    $ln = mysqli_fetch_assoc($qr);
                                    $desc = $ln['pro_descricao'];
                                    $nome = $ln['pro_nome'];
                                    $preco = number_format($ln['pro_valor'], 2, ',', '.');
                                    $sub = number_format($ln['pro_valor'] * $qtd, 2, ',', '.');
                                    $frete = "10,00";
                                    $total += $ln['pro_valor'] * $qtd;
                                    echo '
                                <tr>
                                <td>' . $nome . '</td>
                                <td><input type="text" class="Quant" size="6" name="prod[' . $pro_id . ']" value="' . $qtd . '" /></td>
                                <td>R$ ' . $preco . '</td>
                                <td>R$ ' . $sub . '</td>
                                <td><a href="?acao=del&pro_id=' . $pro_id . '">Remove</a></td>
                                </tr>';
                                }
                                $total = $total + 10;
                                $total = number_format($total, 2, ',', '.');
                                echo '<tr>
                                <td colspan="4">FRETE</td>
                                <td>R$ '.$frete.'</td>
                                </tr>
                                <tr>
                                <td colspan="4">TOTAL</td>
                                <td>R$ ' . $total . '</td>
                                </tr>';
                            }
                            ?>
                        </tbody>
                    </form>
                    <form class="pagseguro" target="pagseguro" method="post" action="https://pagseguro.uol.com.br/checkout/checkout.jhtml">
                        <input type="hidden" name="email_cobranca" value="aninha.pipol@gmail.com" />
                        <input type="hidden" name="tipo" value="CP" />
                        <input type="hidden" name="moeda" value="BRL" />
                        <?php
                        require("conexao.php");

                        $total = 0;
                        $i = 1;
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
                            <input type="hidden" name="item_frete_1" value="1000">
                            <input type="hidden" name="frete" value="EN"/>';
                            $i += 1;
                        }

                        ?>
                        <input type="hidden" name="peso" value="0" />
                        <input type="submit" name="submit" value="COMPRAR" class="comprar" />
                    </form>
                </table>
            </div>
        </center>


        <!-- Rodapé -->
        <div class="footer">
            <div class="dadosEmpresa">
                <h2 class="enderecoContato">Endereço e Contato</h2>
                <h3 class="endereco">Endereço: R. Augusta, 1508 - Consolação, São Paulo - SP,<br /> 01304-001
                </h3>
                <h3 class="contato">Contato: (11) 99283-3067</h3>
                <h3 class="email">Email: brenoreges@outlook.com</h3>
                <h2 class="agradecimento">Obrigado por nós escolher ;)</h2>
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.3289553029376!2d-46.661002885905596!3d-23.556626184685214!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce58348d040de7%3A0x3faa367cc3f3edd1!2sFAM%20-%20Campus%20Paulista!5e0!3m2!1spt-BR!2sbr!4v1588950577330!5m2!1spt-BR!2sbr" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" class="mapa">
            </iframe>
        </div>
    </div>

</body>

</html>