<?php 
   // Passo 1 - Abrir conexão
  
   $servidor = "localhost";
   $usuario = "root";
   $senha = "";
   $banco = "estudando";
   $conecta = mysqli_connect($servidor,$usuario,$senha,$banco) or die(mysqli_error($conecta));
 
  /*$connect = mysqli_connect("localhost","root","","estudando"); */

   /* Passo 2 - Testar Conexão
   if ( mysqli_connect_errno() ){
   	 die("Conexão falhou: " . mysqli_connect_errno());
   }*/
?>