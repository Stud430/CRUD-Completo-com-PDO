
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
<form action=" " method="post">
	<br><center><label for="cadastro"> <h3> Atualizacao </h3> </label></center>
	<hr><br>
 
	<div class="form-group">
	<div class="form-row"> 
	  <div class="col-auto">
	    <label for="procurar">PROCURA</label>
	    <input type="text" name="procurar" class="form-control" id="procura1" placeholder="Ex.: Nome Completo">
	  </div>
    </div>

<hr>
	
	<div class="form-row"> 
	  <div class="col-auto">
	    <label for="ex1">Nome Completo</label>
	    <input type="text" name="ProcNome" class="form-control" id="ex1" type="text">
	  </div>

	  <div class="col-xs-2">
	    <label for="ex2">Idade</label>
	    <input type="number" min="1" max="100" name="ProcIdade" class="form-control" id="ex2" placeholder="Idade">
	  </div>
    </div>
	<p>
	<div class="form-row">
	    <label for="exampleInputEmail1">Email</label>
	    <input class="form-control" name="ProcEmail" id="ex3" type="Email">
	</div>
	</p>
	
 <div class="form-row"> 	
    <div class="col">
      <label for="inputEmail4">Usuário</label>
      <input type="text" name="ProcUsuario" class="form-control" id="inputEmail4" placeholder="Usuário">
    </div>
	
	<div class="col">
	  <label for="inputAddress">Senha</label>
	  <input type="text" name="ProcSenha" class="form-control" id="inputAddress" placeholder="Senha">
	</div>
  </div>
  </div>

<center>
  <div class="form-group">
	<button type="submit" class="btn btn-primary">Atualizar</button>  
    <button type="reset" class="btn btn-primary">Limpar</button> 
  </div>
</center>
 
</form>
<script type="text/javascript" src="PesquisaUsuario.js"></script>
</body>
</html>