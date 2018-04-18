<?php include_once("system/valida_login.php");?>

<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
    <title>Área do Administrador | Fazer Login</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Mestre Moveleiro">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Roboto:300,400,700" rel="stylesheet">

    <meta name="robots" content="noindex, nofollow">

<style type="text/css">
*{font-family: 'Roboto', cursive; text-decoration: none; margin: 0; padding: 0;}

@media screen and (min-width:320px) {
.container-login{
 float: left;
 width: 100%;
 padding-top: 40px;
 padding-bottom: 40px;
 background-color: #e4e4e5;
 background-image: url(http://www.mestremoveleiro.com.br/img/bg.png);
 background-repeat: no-repeat;
 background-position: -90px -150px;
 height: 100vh;
}
.form-login{
 float: initial;
 width: 100%;
 margin: auto;
 background: #151515a8;
 margin-top: 50px;
 padding-top: 100px;
 padding-bottom: 100px;
 border-radius: 10px;
}
img{
 display: block;
 margin: auto;
 margin-top: 20px;
 margin-bottom: 20px;
 width: 200px;
}
form{
 text-align: center;
 margin-top: 20px;
}
input[type="email"]{
 border: 1px solid #ccc;
 width: 80%;
 height: 35px;
 padding-left: 10px;
 margin-top: 10px;
 border-radius: 3px;
 font-size: 18px;
 color: #151515;
}
input[type="password"]{
 border: 1px solid #ccc;
 width: 80%;
 height: 35px;
 padding-left: 10px;
 margin-top: 10px;
 border-radius: 3px;
 font-size: 18px;
 color: #151515;
}
input[type="submit"]{
 border: none;
 width: 50%;
 height: 40px;
 margin-top: 20px;
 border-radius: 3px;
 font-size: 18px;
 font-weight: bold;
 background-color: #fff;
 color: #014d8f;
}
input[type="submit"]:hover{
 background-color: #d8d8d8;
 color: #014d8f;
 cursor: pointer;
}
.texto-login{
 float: left;
 width: 100%;    
}
.texto-login h2{
 text-align: center;
 color: #fff;
 font-size: 20px !important;
}

}

/* PARA PC ======================**/
@media screen and (min-width:320px) {
.form-login{
 width: 25%;
}

}

</style>

</head>
<body>
    
<div class="container-login">
  <div class="container">


    <div class="row-login" style="width: 100%; float: left;">
    <div class="form-login">

    <div class="texto-login"><h2>Fazer Login</h2></div>
    <form method="POST">
        <input type="email" placeholder="Email" name="email" required><br />
        <input type="password" placeholder="Senha" name="senha" required><br />
        <input type="submit" value="Entrar" name="entrar">
    </form>

    </div>
    </div>


  </div>
</div>

</body>
</html>