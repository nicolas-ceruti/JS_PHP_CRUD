<?php
session_start(); 
include("connection.php");

if((isset($_POST['username'])) && (isset($_POST['password']))){

    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql_login = "SELECT * FROM dm_usuarios WHERE email = '$username' AND senha = '$password'";
    $res_sql = mysqli_query($conn, $sql_login);
    $resultado = mysqli_num_rows($res_sql);

    if($resultado > 0){ //Usuário Existe

        $sql_id = "SELECT id, nome, sobrenome FROM dm_usuarios WHERE email = '$username' AND senha = '$password'";
        $res_id =$conn -> query($sql_id);
        $row = $res_id -> fetch_array(MYSQLI_ASSOC);
        $id = parse_str($queryRow['id']);
        
        session_start();

        $_SESSION['id'] =  $row["id"];



        header("Location:home.php"); 

    }else{ //Usuário não existe
        $_SESSION['loginErro'] = "Usuário ou senha Inválido";
        header("Location:index.php");;  
    }

}else{ //Campos preenchidos incorretamente
    $_SESSION['loginErro'] = "Usuário ou senha inválido";
    header("Location: index.php");
}
?>
