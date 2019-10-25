<?php	

	include_once("conexao.php");

	$html = '<br><table border=1 align=center width=50% cellspacing=0 cellpadding=10> <body>'; // cellspacing=2 cellpadding=20';	
	$html .= '<tr>';
	$html .= '<td width=75% align="center"> USUARIO: </td>';
	$html .= '<td width=75% align="center"> SENHA: </td> </tr><br>';	


	$result_transacoes = "SELECT usuario, senha FROM login";
	$resultado_trasacoes = mysqli_query($conecta, $result_transacoes);
	while($row_transacoes = mysqli_fetch_assoc($resultado_trasacoes)){
		$html .= '<tr><br><td align=center>'.$row_transacoes['usuario'] . "</td>";
		$html .=  "<td align=center>" . $row_transacoes['senha'] . "</td> </tr>";		
	}

	$html .= '</table> </body>';
	
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();
	
	// Carrega seu HTML
	$dompdf->load_html(' <h1 style="text-align: center;"> Listagem de Usuarios do Sistema </h1>	' . $html .'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"UsuariosSistema.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>
