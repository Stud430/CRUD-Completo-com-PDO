<?php
	include_once './conexaoPDO.php';
  	$conn = getConnection();
?>

<?php

	if(isset($_POST['editar']))
{
    $id = $_POST['id'];
    $nome=$_POST['ProcNome'];
    $idade=$_POST['ProcIdade'];
    $email=$_POST['ProcEmail'];
    $usuario=$_POST['ProcUsuario'];
    $senha=$_POST['ProcSenha'];

    // Verificando os campos se estao preenchidos
    if(empty($nome) || empty($idade) || empty($email) || empty($usuario) || empty($senha)) {
        if(empty($nome)) {
            echo "<font color='red'>Campo Nome Obrigatorio.</font><br/>";
        }
        if(empty($idade)) {
            echo "<font color='red'>Campo Idade Obrigatorio.</font><br/>";
        }
        if(empty($email)) {
            echo "<font color='red'>Campo Email Obrigatorio.</font><br/>";
        }
        if(empty($usuario)) {
            echo "<font color='red'>Campo Usuário Obrigatorio.</font><br/>";
        }
        if(empty($senha)) {
            echo "<font color='red'>Campo Senha Obrigatorio.</font><br/>";
        }
    } else {
        //atualizado dados na tabela
        $sql = "UPDATE login SET nome_completo = :nome, idade = :idade, email = :email, usuario= :usuario, senha = :senha WHERE id=:id";

        $query = $conn->prepare($sql);

        $query->bindparam(':id', $id);
        $query->bindparam(':nome', $nome);
        $query->bindparam(':idade', $idade);
        $query->bindparam(':email', $email);
        $query->bindparam(':usuario', $usuario);
        $query->bindparam(':senha', $senha);

        $query->execute();
        //Redirecionado para a pagina de Listagem
        header("Location: Listagem_PDO.php");
    }
}
?>

<?php
	// pega o ID da URL
	$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
	//$id = $_GET['id'];

	// Consulta a tabela de Login
    $consulta = "SELECT id, nome_completo, idade, email, usuario, senha ";
    $consulta .= "FROM login ";
    $consulta .= "WHERE id = :id ";


/*
    $con_login = $conn->prepare($consulta);
    $con_login->execute();
    $linha = $con_login -> fetch(PDO::FETCH_ASSOC);
*/
 
	$con_login = $conn->prepare($consulta);
	$con_login->execute(array(':id' => $id));

	$linha = $con_login->fetch(PDO::FETCH_ASSOC)
?>

<html>
<head> <br>
<meta charset="utf-8">	
<title> Tela De Atualizacao </title>
<link rel="stylesheet" href="css/estiloAtualizacao.css">
<link rel="stylesheet" type="text/css" href="css/jquery-3.4.1.min.js">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


<table border=0 align=right width=20% cellspacing=0 cellpadding=10>
<tr>
	<td align=center> <a class="btn btn-primary" href="Tela_Cadastro.html"> CADASTRO </a> </td> 
	<td align=center> <label> | </label> </td>
	<td align=center> <a class="btn btn-primary" href="Listagem_PDO.php"> LISTAGEM </a> </td> <!--
	<td align=center> <label> | </label> </td>
	<td align=center> <a class="btn btn-primary" href="Tela_Atualizacao.php"> ATUALIZACAO </a> </td>
	<td align=center> <label> | </label> </td>
	<td align=center> <a class="btn btn-primary" href="Tela_Exclusao.php"> EXCLUSAO </a> </td> -->
</tr>
</table>

<br>
</head>
<br>
<hr>

<body>		
<form action="AtualizacaoPDO.php" method="post">
	<br><center><label for="cadastro"> <h3> Atualizacao </h3> </label></center>
	<hr><br>
 
	<div class="form-group">
	
	<hr>
	
	<div class="form-row"> 
	  <div class="col-auto">
	    <label for="ex1">Nome Completo</label>
	    <input type="text" value="<?php echo utf8_encode($linha["nome_completo"]) ?>" name="ProcNome" class="form-control" id="ProcNome" type="text">
	  </div>

	  <div class="col-xs-2">
	    <label for="ex2">Idade</label>
	    <input type="number" value="<?php echo $linha["idade"] ?>" min="1" max="100" name="ProcIdade" class="form-control" id="ProcIdade" placeholder="Idade">
	  </div>
    </div>
	<p>
	<div class="form-row">
	    <label for="exampleInputEmail1">Email</label>
	    <input class="form-control" value="<?php echo utf8_encode($linha["email"]) ?>" name="ProcEmail" id="ProcEmail" type="Email">
	</div>
	</p>
	
 <div class="form-row"> 	
    <div class="col">
      <label for="inputEmail4">Usuário</label>
      <input type="text" value="<?php echo utf8_encode($linha["usuario"]) ?>" name="ProcUsuario" class="form-control" id="ProcUsuario" placeholder="Usuário">
    </div>
	
	<div class="col">
	  <label for="inputAddress">Senha</label>
	  <input type="text" value="<?php echo $linha["senha"] ?>" name="ProcSenha" class="form-control" id="ProcSenha" placeholder="Senha">
	</div>

	<div class="col">
		<input type="hidden" name="id" value="<?php echo $linha["id"] ?>">
	</div>
  </div>
  </div>

<center>
  <div class="form-group">
	<button type="submit" name="editar" class="btn btn-warning" value="submit">Atualizar</button>  
   <!-- <button type="reset" class="btn btn-info" value="reset">Limpar</button> -->
  </div>
</center>
 
</form>

</body>
</html>