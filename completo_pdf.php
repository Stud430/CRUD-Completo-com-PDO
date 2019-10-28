<?php	

	include_once("conexao.php");

	$html = '<br><table border=1 align=center cellspacing=0 cellpadding=10> <body>'; 
	$html .= '<tr>';
	$html .= '<td width=75% align="center" bgcolor=#BFFFD8> NOME COMPLETO: </td>';
	$html .= '<td width=75% align="center" bgcolor=#BFFFD8> IDADE: </td>';
	$html .= '<td width=75% align="center" bgcolor=#BFFFD8> E-MAIL: </td>';
	$html .= '<td width=75% align="center" bgcolor=#BFFFD8> USUARIO: </td>';
	$html .= '<td width=75% align="center" bgcolor=#BFFFD8> SENHA: </td> </tr><br>';	


	$result_transacoes = "SELECT nome_completo, idade, email, usuario, senha FROM login order by nome_completo asc ";
	$resultado_trasacoes = mysqli_query($conecta, $result_transacoes);
	while($row_transacoes = mysqli_fetch_assoc($resultado_trasacoes)){
		$html .= '<tr><br><td align=center>'.$row_transacoes['nome_completo'] . "</td>";
		$html .=  "<td align=center>" . $row_transacoes['idade'] . "</td>";
		$html .=  "<td align=center>" . $row_transacoes['email'] . "</td>";
		$html .=  "<td align=center>" . $row_transacoes['usuario'] . "</td>";
		$html .=  "<td align=center>" . $row_transacoes['senha'] . "</td> </tr>";		
	}


	$html .= '</body></table>';

	
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();
	
	// Defini o tipo de Papel e sua Orientacao
	$dompdf->setPaper('A4','portrait');

	// Carrega seu HTML
	$dompdf->load_html(' <h1 style="text-align: center;"> Dados Completos </h1>	' . $html .'
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

/* https://color.adobe.com/pt/create */
?>


