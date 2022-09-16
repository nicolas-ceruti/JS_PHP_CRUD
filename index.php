
<!DOCTYPE html>

<html lang="en">
    <head profile="http://www.w3.org/2005/10/profile">
    <link rel="icon" 
    type="image/jpg" 
    href="https://static.vecteezy.com/ti/vetor-gratis/p3/5545335-usuario-sinal-icone-pessoa-simbolo-humano-avatar-isolado-em-branco-backogrund-vetor.jpg">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./index.css" />
    <title>Login Page</title>
</head>
<body>
<form method="POST" action="login.php">
    <div class="margin">
        <div class="form">       
            <h2 class="titulo">Login</h2>
            <input type="text" class="TextField" name="username" id="username" placeholder="Email" required="" autofocus="" />
            <input type="password" class="TextField" name="password" id="password" placeholder="Senha" required=""/>  
            <div><button class="LoginButton" type="submit" value="entrar" id='entrar'>Login</button></div>       
        </div>
    </div>
</form>
<p>
            <?php 
			//Limpando o valor da variável, caso o login não seja efetuado
			if(isset($_SESSION['loginErro'])){
                echo $_SESSION['loginErro'];
                unset($_SESSION['loginErro']);
            }?>
        </p>
</body>
</html>