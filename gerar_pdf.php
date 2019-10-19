<?php	

	include_once("conexao.php");

	$html = '<table border=3'; // cellspacing=2 cellpadding=20';	
	$html .= '<tr>';
	$html .= '<td width=525 align="center"> USUARIO:	</td>';
	$html .= '<td width=525 align="center"> SENHA: </td>';	
	$html .= '</tr> <br>';
	$html .= '<tbody>';


	$result_transacoes = "SELECT usuario, senha FROM login";
	$resultado_trasacoes = mysqli_query($conecta, $result_transacoes);
	while($row_transacoes = mysqli_fetch_assoc($resultado_trasacoes)){
		$html .= '<tr> <br> <td>'.$row_transacoes['usuario'] . "</td>";
		$html .= '<td>'.$row_transacoes['senha'] . "</td> </tr>";		
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