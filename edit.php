<?php 

include("connection.php");

session_start();


if(isset($_POST['id'])){


    $id = $_POST['id'];

    $nome = $_POST['nome'];

    $sobrenome = $_POST['sobrenome'];

    $email = $_POST['email'];

    $telefone = $_POST['telefone'];

    $idade = ($_POST['idade']);


    if($_SESSION['id'] != $id ){

        $sql_edit = "UPDATE dm_usuarios SET nome='{$nome}', sobrenome='{$sobrenome}', 
                                                    email='{$email}', telefone='{$telefone}', idade={$idade} 
                                                    WHERE
                                                    id= {$id}";

        if(mysqli_query($conn, $sql_edit)){
            
            $json_response = array('status' => 'trueE');    

        }else{

            $json_response = array('status' => 'falseE');
            
        }

    }else if($_SESSION['id'] == $id ){

        $json_response = array('status' => 'falseE');

    }

}else{
    
    $json_response = array('status' => 'falseE');

}


echo json_encode($json_response);

?>