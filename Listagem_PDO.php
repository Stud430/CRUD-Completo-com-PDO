<?php
	include_once './conexaoPDO.php';
  $conn = getConnection();
?>

<html>
<head> <br>
<title> Listagem de Dados </title>

<link rel="stylesheet" type="text/css" href="css/jquery-3.4.1.min.js">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


<table border=0 align=right width=20% cellspacing=0 cellpadding=10>
<tr>
  <td align=center> <a class="btn btn-primary" href="Tela_Cadastro.html"> CADASTRO </a> </td> 

  <td align=center> <label> | </label> </td>
  <td align=center> <a class="btn btn-primary" href="Listagem_PDO.php"> LISTAGEM </a> </td>
<!--
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

<!-- <center><h1>Listar Mensagem</h1></center> -->

<center>
<body> 
<br><center><label for="cadastro"> <h3>  Listagem </h3> </label></center>
<hr><br>

      <?php

        //SQL para selecionar os registros
       $sql = "SELECT id,nome_completo, usuario, senha FROM login order by id";

       //Seleciona os registros
       $consulta = $conn->prepare($sql);
       $consulta->execute();
       if (!$consulta) {
         die("Erro no Banco!");
       }
       
       echo '<link rel="stylesheet" href="css/estiloListagemPDO.css">';
       echo '<table class="table table-hover">';
       echo "<thead>";
       echo "<tr>";
       echo "<th><center> ID </center></th>";
       echo "<th><center> Nome Completo </center></th>";
       echo "<th><center> Usuário </center></th>";
       echo "<th><center> Senha </center></th>";
       echo "<th><center> Acoes </center></th>";             
       echo "</tr>";
       echo "</thead>";
       echo "<tbody>";

       while ($row_msg_cont = $consulta->fetch(PDO::FETCH_ASSOC)) {
          echo "<tr>";
          echo "<th><center>" . $row_msg_cont['id'] . "</center></th>";
          echo "<td><center>" . $row_msg_cont['nome_completo'] . "</center></td>";
          echo "<td><center>" . $row_msg_cont['usuario'] . "</center></td>";
          echo "<td><center>" . $row_msg_cont['senha'] . "</center></td>";
      ?>

      <td><center><a class="btn btn-warning" href="AtualizacaoPDO.php?id=<?php echo $row_msg_cont["id"]?>"> Atualizar</a></center></td>
      <td><center><a class="btn btn-danger" href="ExclusaoPDO.php?id=<?php echo $row_msg_cont["id"]?>">Excluir</a></center></td>

    <?php
          echo "</tr>";
        }
        
        echo "</tbody>";        
        echo "</table>";

        ?>
        
</body>
</center>

<!-- https://www.w3schools.com/html/html_form_input_types.asp -->
<!-- https://getbootstrap.com/docs/4.4/components/buttons/ -->
<!-- https://getbootstrap.com/docs/4.1/content/tables/ -- >

<!-- 
<hr>
<table border=0 align=right width=20% cellspacing=0 cellpadding=10>
<tr>
	<td align=center> <a href="Tela_Cadastro.html"> CADASTRO </a> </td> 
	<td align=center> <label> | </label> </td> 
	<td align=center> <a href="Tela_Login.html"> LISTAGEM </a> </td> 
</tr>
</table>
<br>
<hr>
 -->

</html>