<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form target="pagseguro" method="post" action="https://pagseguro.uol.com.br/checkout/checkout.jhtml">
  <input type="hidden" name="email_cobranca" value="suporte@lojamodelo.com.br" />
  <input type="hidden" name="tipo" value="CBR" />
  <input type="hidden" name="moeda" value="BRL" />
  <input type="hidden" name="item_id" value="12345" />
  <input type="hidden" name="item_descr" value="Descrição do item a ser vendido" />
  <input type="hidden" name="item_quant" value="1" />
  <input type="hidden" name="item_valor" value="100" />
  <input type="hidden" name="frete" value="0" />
  <input type="hidden" name="peso" value="0" />
  <input type="image" name="submit" src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/pagamentos/99x61-comprar-assina.gif" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
</form>
</body>
</html>