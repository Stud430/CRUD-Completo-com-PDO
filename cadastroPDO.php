
<?php

include './conexaoPDO.php';

$conn = getConnection();
//Nome da Tabela do Banco // Campos do banco (colunas)						// Campos que irão assumir o valor das $variaveis
$sql = 'INSERT INTO login (nome_completo, idade, email, usuario, senha) VALUES (:nomecompleto, :idade, :email, :usuario, :senha)';

// $variaveis que assumem os valores dos "campos"
$nome = $_POST["nome"];
$idade =  $_POST["idade"];
$email =  $_POST["email"];
$usuario =  $_POST["usuario"];
$senha =  $_POST["senha"];

$stmt = $conn->prepare($sql);
$stmt->bindParam(':nomecompleto', $nome);
$stmt->bindParam(':idade', $idade);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':usuario', $usuario);
$stmt->bindParam(':senha', $senha);

if($stmt->execute()){
    echo "<script> alert('Cadastro Realizado com sucesso !!!'); </script>";
    echo "<script> document.location.href = 'Tela_Cadastro.html'; </script>";
}else{
    echo "<script> alert('Informe os Dados Corretamente !!!'); </script>";
    echo "<script> document.location.href = 'Tela_Cadastro.html'; </script>";
}



/*

$conn = getConnection();

$sql = "INSERT INTO login (nome_completo, idade, email, usuario, senha) VALUES(:nomecompleto, :idade, :email, :usuario, :senha)";

if($conn->exec($sql)){
      echo "<script> alert('Cadastro Realizado com sucesso !!!'); </script>";
      echo "<script> document.location.href = 'Tela_Cadastro.html'; </script>";
}else{
    echo 'Erro ao salvar!';
}

*/  
?>