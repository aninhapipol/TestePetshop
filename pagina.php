<?php
	$url = $_POST['url'];
	switch ($url) {
	case "home": ?>
    	<h1>Teste</h1>
    <?php	
		break;
    case "pagina1":
        echo "Página 1";
        break;
	default:
       	echo "Nada encontrado";
}
?>

