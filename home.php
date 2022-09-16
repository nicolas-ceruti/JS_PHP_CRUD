<?php

  require("connection.php");

  session_start();

?>


<!DOCTYPE html>


<html lang="en">

    <head>

        <link rel="icon" 

            type="image/jpg" 

            href="https://static.vecteezy.com/ti/vetor-gratis/p3/5545335-usuario-sinal-icone-pessoa-simbolo-humano-avatar-isolado-em-branco-backogrund-vetor.jpg">

        <meta charset="UTF-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="./home.css" />

    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
            
            
        <title>Início</title>

    </head>

    <!-- <!Menu!> -->

    <body>
    <div class="inicial">

    <div class="Menu">

      <a class="inicioButton" href="">Início</a>

      <a class="cadastroButton" href="#abrirModal" >Cadastro</a>

      <a class="logOutButton" href="logout.php">Sair</a>  

    </div> 

    </div>




    <!-- <!Mensagem abaixo do Menu!> -->

    <?php 
        if(isset($_GET['cad_status']) and !empty($_GET['cad_status'])){
    ?>
        <div id='message' class="alert alert-secondary" role="alert ">

            <?php

            if($_GET['cad_status'] == 'trueR'){

                echo "Cadastro realizado com sucesso!";

            }else if ($_GET['cad_status'] == 'falseR'){

                echo "Erro no cadastro, tente novamente mais tarde!";

            }else if ($_GET['cad_status'] == 'trueE'){
                
                echo "Edição realizada com sucesso!";

            }else if ($_GET['cad_status'] == 'falseE'){
                
                echo "Erro ao Editar, tente novamente mais tarde!";

            }else if ($_GET['cad_status'] == 'trueD'){
                
                echo "Exclusão realizada com sucesso!";
            
            }else if ($_GET['cad_status'] == 'falseR'){
                
                echo "Erro na exclusão, tente novamente mais tarde!";

            }

                echo "Seja Bem-Vindo";
            }
            
            ?>
        </div>
    <?php  
        
    ?>

    <!-- <!Cadastrar!> -->

    <div class="cadastro" id="abrirModal" >

        <form method="POST" action="register.php">
        
        <a href="#fechar" title="Fechar" class="fechar">x</a>

        <input type="text" class="entradaNome" name="nome" id="nome" placeholder="Nome" /><br>

        <input type="text" class="entradaSobrenome" name="sobrenome" id="sobrenome" placeholder="Sobrenome" /><br>

        <input type="text" class="entradaEmail" name="email" id="email" placeholder="Email" /><br>

        <input type="text" class="entradaTelefone" name="telefone" id="telefone" placeholder="Telefone" /><br>

        <input type="text" class="entradaIdade" name="idade" id="idade" placeholder="Idade" />

        <div><button name='registerButton' class="RegisterButton" type="submit" value="registerButton" id='cadastrar'>Cadastrar</button></div>

        </form>

    </div>



    <!-- <!Editar!> -->

    <div class="cadastro" id="modalEditar" >

        <form method="POST"> 

            <a href="#fechar" title="Fechar" class="fechar">x</a>

            <input type="text" class="entradaNome" id="editEntradaNome" name="nome" placeholder="Nome" /><br>

            <input type="text" class="entradaSobrenome" id="editEntradaSobrenome" name="sobrenome" placeholder="Sobrenome" /><br>

            <input type="text" class="entradaEmail" name="email" id="editEntradaEmail" placeholder="Email" /><br>

            <input type="text" class="entradaTelefone" name="telefone" id="editEntradaTelefone" placeholder="Telefone" /><br>

            <input type="text" class="entradaIdade" name="idade" id="editEntradaIdade" placeholder="Idade" />
            <div>
                <a name='editButton' class="RegisterButton" id="editUserForm" value="editButton" id='cadastrar'>Editar</a>
            </div>

        </form>

    </div>


    <!-- <!Apagar!> -->

    <div class="modal fade" id="confirm" role="dialog">
        <div class="modal-dialog modal-md">

            <div class="modal-content">
                <div class="modal-body">
                    <p> Deseja apagar o registro? <input type='text' class='nomeDoUsuario' id='nomeDoUsuario' /></p>
                    
                </div>
                <div class="modal-footer">
                <a href="wfefwe" type="button" class="btn btn-danger" id="deleteButton">Apagar Registo</a>
                <button type="button" data-dismiss="modal" class="btn btn-default">Cancelar</button>
            </div>
        </div>

        </div>
    </div>



    <!-- <!Tabela!> -->

    <div style='
    display: flex;
    height: 100vh;
    align-items: center;
    justify-content: center;'>

    
        <?php

            $sql_get = "SELECT * FROM dm_usuarios";

            $res_sql = $conn ->query($sql_get);

            $qtd = $res_sql->num_rows;


            if($qtd > 0){

                print "<table class= 'table table-hover 
                    table-striped table-bordered style=''>";

                print "<tr>";

                print "<th >ID</th>";

                print "<th>Nome</th>";

                print "<th>Sobrenome</th>";

                print "<th>Email</th>";

                print "<th>Telefone</th>";

                print "<th>Idade</th>";
                
                print "<th>Ações</th>";

                print "</tr>";

            while($row = $res_sql->fetch_object()){

                print "<tr>";

                print "<td class='id'>".$row->id."</td>";

                print "<td class='nome'>".$row->nome."</td>";

                print "<td class='sobrenome'>".$row->sobrenome."</td>";

                print "<td class='email'>".$row->email."</td>";

                print "<td class='telefone'>".$row->telefone."</td>";

                print "<td class='idade'>".$row->idade."</td>";

                print "<td>

                        <a href='#modalEditar' class='editUser'><button name='editButton' class='btn btn-success'>Editar</button> </a>
                        <a class='deleteUser'  data-toggle='modal' data-target='#confirm' type='button' ><button name='deleteButton' class='btn btn-danger'>Excluir</button> </a>
                        </td>";       

                print "</tr>";

            }

            print "</table>";

        }               

        ?>


    </div>  

    </body>

</html>

<!-- <!Btões Editar e Excluir!> -->
<script>
$(document).ready(function () {
 
    //editar
    $('.editUser').click(function () {

        $('#editEntradaNome').attr('data-id', $(this).closest('tr').find('.id').text())       

        $('#editEntradaNome').val($(this).closest('tr').find('.nome').text())   //entradanome.val(valor para setar)
        $('#editEntradaSobrenome').val($(this).closest('tr').find('.sobrenome').text())
        $('#editEntradaEmail').val($(this).closest('tr').find('.email').text())
        $('#editEntradaTelefone').val($(this).closest('tr').find('.telefone').text())
        $('#editEntradaIdade').val($(this).closest('tr').find('.idade').text())
    
    })

    $('#editUserForm').click(function (event) {
        
        event.preventDefault()  //anula o evento do botão

        $.ajax({
        url : "./edit.php",  //.php destino
        type : 'post', //método
        data : {
            id : $('#editEntradaNome').data('id'), //valores que serão enviados
            nome : $('#editEntradaNome').val(),
            sobrenome : $('#editEntradaSobrenome').val(),
            email:  $('#editEntradaEmail').val(),
            telefone: $('#editEntradaTelefone').val(),
            idade: $('#editEntradaIdade').val()
        },
        beforeSend : function(){
            $("#editUserForm").text("ENVIANDO...");  //antes de receber a resposta
        }
        })
        .done(function(msg){
            $("#editUserForm").text('Alterado como sucesso!');  //depois de enviado
        })
        .fail(function(jqXHR, textStatus, msg){
            alert(msg);
        });
    })



    //excluir
    $('.deleteUser').click(function () {

        $('#nomeDoUsuario').attr('data-id', $(this).closest('tr').find('.id').text())       

        $('#nomeDoUsuario').val(($(this).closest('tr').find('.nome').text()) + (' ') + ($(this).closest('tr').find('.sobrenome').text()))  

        })

    })
    
    $('#deleteButton').click(function (event) {


        event.preventDefault()  

        $.ajax({
        url : "./delete.php",  
        type : 'post',
        data : {
            id : $('#nomeDoUsuario').data('id') //valores que serão enviados
        },
        beforeSend : function(){
            $("#deleteButton").text("ENVIANDO...");
        }
        })
        .done(function(msg){
            $("#deleteButton").text('Excluído!'); 
        })
        .fail(function(jqXHR, textStatus, msg){
            alert(msg);
        });


});

</script>