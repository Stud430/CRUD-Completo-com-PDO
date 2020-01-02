
<?php
	include './conexaoPDO.php';
	$conn = getConnection();
?>

<?php
	// pega o ID da URL
	$id = isset($_GET['id']) ? $_GET['id'] : null;
	 
	// valida o ID
	if (empty($id))
	{
	    echo "ID não informado";
	    exit;
	}
	 
	// remove do banco
	$sql = "DELETE FROM login WHERE id = :id";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	 
	if ($stmt->execute())
	{
		//echo "<script> alert('Remocao Realizada com sucesso !!!'); </script>";	
	    header('Location: Listagem_PDO.php');
	    echo "<script> document.location.href = 'Listagem_PDO.php'; </script>";
	}
	else
	{
	    echo "Erro ao remover";
	    print_r($stmt->errorInfo());
	}		

// Consulta a tabela de Login
    $consulta = "SELECT nome_completo, idade, email, usuario, senha ";
    $consulta .= "FROM login ";
    
    if(isset($_GET["id"]) ) {
        $id = $_GET["id"];
        $consulta .= "WHERE id = {$id} ";
    }

    $con_login = $conn->prepare($consulta);
    $con_login->execute();
    $linha = $con_login -> fetch(PDO::FETCH_ASSOC);

 /*Referëncia: http://blog.ultimatephp.com.br/sistema-de-cadastro-php-mysql-pdo/*/
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
	<form action="ExclusaoPDO.php" method="post">
		<br><center><label for="cadastro"> <h3> Exclusao </h3> </label></center>
		<hr><br>

	<div class="form-group">
	
	<hr>
	
	<div class="form-row"> 
	  <div class="col-auto">
	    <label for="ex1">Nome Completo</label>
	    <input type="text" value="<?php echo utf8_encode($linha["nome_completo"]) ?>" name="ExcNome" class="form-control" id="ExcNome" type="text">
	  </div>

	  <div class="col-xs-2">
	    <label for="ex2">Idade</label>
	    <input type="number" value="<?php echo $linha["idade"] ?>" min="1" max="100" name="ExcIdade" class="form-control" id="ExcIdade" placeholder="Idade">
	  </div>
    </div>
	<p>
	<div class="form-row">
	    <label for="exampleInputEmail1">Email</label>
	    <input class="form-control" value="<?php echo utf8_encode($linha["email"]) ?>" name="ExcEmail" id="ExcEmail" type="Email">
	</div>
	</p>
	
 <div class="form-row"> 	
    <div class="col">
      <label for="inputEmail4">Usuário</label>
      <input type="text" value="<?php echo utf8_encode($linha["usuario"]) ?>" name="ExcUsuario" class="form-control" id="ExcUsuario" placeholder="Usuário">
    </div>
	
	<div class="col">
	  <label for="inputAddress">Senha</label>
	  <input type="text" value="<?php echo $linha["senha"] ?>" name="ExcSenha" class="form-control" id="ExcSenha" placeholder="Senha">
	</div>

	<div class="col">
		<input type="hidden" name="id" value="<?php echo $linha["id"] ?>">
	</div>
  </div>
  </div>
	
	<br>
	
	<center>
	  <div class="form-group">
		<button type="submit" value="submit" class="btn btn-primary">Excluir</button>  
	  <!--  <button type="reset" class="btn btn-primary">Limpar</button> -->
	  </div>
	</center>

	</form>
</body>
</html>