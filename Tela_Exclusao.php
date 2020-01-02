<?php

include './conexaoPDO.php';

$conn = getConnection();

?>

<?php
    
    // consulta aos usuarios
    $usuarios = "SELECT * ";
    $usuarios .= "FROM login ";
   									
    //Seleciona os registros
    $consulta = $conn->prepare($usuarios);
    $consulta->execute();
    if(!$consulta) {
       die("erro no banco"); 
    }

?>


<?php

$sql = 'DELETE FROM login WHERE nome_completo = :nome';

//$id = 2;
$nome = $_POST["usuarios"];

$stmt = $conn->prepare($sql);
$stmt->bindParam(':nome', $nome);


if($stmt->execute()){
    echo 'Excluido com sucesso!';
}else{
    echo 'Erro ao excluir!';
}
?>

<html>
<head> <br>
<meta charset="utf-8">		
<title> Tela De Exclusao </title>
<link rel="stylesheet" href="css/estiloExclusao.css">
<link rel="stylesheet" type="text/css" href="css/jquery-3.4.1.min.js">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


<table border=0 align=right width=20% cellspacing=0 cellpadding=10>
<tr>
	<td align=center> <a class="btn btn-primary" href="Tela_Cadastro.html"> CADASTRO </a> </td> 
	<td align=center> <label> | </label> </td>
	<td align=center> <a class="btn btn-primary" href="Listagem_PDO.php"> LISTAGEM </a> </td>
	<td align=center> <label> | </label> </td>
	<td align=center> <a class="btn btn-primary" href="Tela_Atualizacao.php"> ATUALIZACAO </a> </td>
	<td align=center> <label> | </label> </td>
	<td align=center> <a class="btn btn-primary" href="Tela_Exclusao.php"> EXCLUSAO </a> </td>
</tr>
</table>

<br>
</head>
<br>
<hr>

<body>		
	<form action="Tela_Exclusao.php" method="post">
		<br><center><label for="cadastro"> <h3> Exclusao </h3> </label></center>
		<hr><br>

	<div class="form-group">
	    <label for="exampleFormControlSelect1">Escolha o Usuário para Exclusao</label>
	    <select name="Usuarios" class="form-control" id="Usuarios">
	    	<option selected>
                    <?php echo "Selecione um Usuário" ?>
            </option>
	    	<?php 	    		
                while($linha = $consulta->fetch(PDO::FETCH_ASSOC)) 
                    {
                ?>

                <option value="<?php echo $linha["id"] ?>">
                    <?php echo utf8_encode($linha["nome_completo"]) ?>
                </option>
                <!--
			      <option>Escolha um Usuário</option>
			      <option>1</option>
			      <option>2</option>
			      <option>3</option>
			      <option>4</option>
			      <option>5</option> -->
			    <?php
                    }
                ?>  
		</select>
    </div>

    <center><h6> ou </h6></center>

	<center>    
    <div class="form-group">
      <input type="text" name="nomeUsuario" class="form-control" placeholder="Nome Completo ou Parte dele">
    </div>
    </center>
	
	<br>
	
	<center>
	  <div class="form-group">
		<button type="submit" class="btn btn-primary">Excluir</button>  
	    <button type="reset" class="btn btn-primary">Limpar</button> 
	  </div>
	</center>

	</form>
</body>
</html>