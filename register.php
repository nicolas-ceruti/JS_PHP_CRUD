<?php 

include("connection.php");


if(isset($_POST['registerButton'])){


    $nome = $_POST['nome'];

    $sobrenome = $_POST['sobrenome'];

    $email = $_POST['email'];

    $telefone = $_POST['telefone'];

    $idade = ($_POST['idade']);

    


    $sql_register = "INSERT INTO dm_usuarios (nome, sobrenome, email, telefone, idade, senha) VALUES ('{$nome}', '{$sobrenome}', '{$email}', '{$telefone}', {$idade}, '{$nome}')";

    if(mysqli_query($conn, $sql_register)){
        
        header("Location:home.php?cad_status='trueR'");

    }else{

        header("Location:home.php?cad_status='falseR'");
    }


}else{

    print "<script>alert('Não Foi Possível Cadastrar');</script>";
    
    header("Location:home.php");
}

?>