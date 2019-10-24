<?php	

	include_once("conexao.php");

	$html = '<table border=1 width=75% cellpadding=2>'; // cellspacing=2 cellpadding=20';	
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<td width=75% align="center"> USUARIO: </td>';
	$html .= '<td width=75% align="center"> SENHA: </td>';	
	$html .= '</tr> ';
	$html .= '</thead>';	
	$html .= '<tbody>';


	$result_transacoes = "SELECT usuario, senha FROM login";
	$resultado_trasacoes = mysqli_query($conecta, $result_transacoes);
	while($row_transacoes = mysqli_fetch_assoc($resultado_trasacoes)){
		$html .= '<tr><td><center>'.$row_transacoes['usuario'] . "</center></td>";
		$html .= '<td><center>'.$row_transacoes['senha'] . "</center></td> </tr>";		
	}


	$html .= '</tbody>';	
	$html .= '</table>';

	
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
