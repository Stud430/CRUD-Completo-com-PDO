<?php 
   include "conexao.php";

   $nomecompleto = $_POST["name"];
   $usuario = $_POST["usuario"];
   $senha = $_POST["senha"];

   $sql = "insert into login (nome, usuario, senha) values ('$nomecompleto', '$usuario', '$senha')";
   mysqli_query($conecta, $sql) or die("Erro no Comando SQL: ". mysqli_error($conecta));

   if (mysqli_affected_rows($conecta)==1) {
      echo "Cadastro Realizado com Sucesso !!! ";
   } else {
      print "<h2>Cadastro não realizado. Motivo: </h2>".mysqli_error();
   }

mysqli_close($conecta);


/* Passo 6 - Fecha Conexão
   mysqli_close($conecta);
*/
   
?>