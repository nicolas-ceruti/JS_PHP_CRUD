<?php 

include("connection.php");

print_r($_POST);

session_start();

if(isset($_POST['id']) && ($_POST['id'] != $_SESSION['id'])){

    $id = $_POST['id'];


    $sql_delete = "DELETE FROM dm_usuarios WHERE id={$id}";

    echo $sql_delete;

    if(mysqli_query($conn, $sql_delete)){
        
        $json_response = array('status' => 'trueD');    

    }else{

        $json_response = array('status' => 'falseD');
        
    }


}else{

    $json_response = array('status' => 'falseD');

}

echo json_encode($json_response);

?>