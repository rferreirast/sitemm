<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
<style>

*{
  padding: 0;
  margin: 0;
}
#editar-produto{
 width: 100%;
 height: 100%;
 top: 0;
 left: 0;
 background-color: rgba(0,0,0,0.8);
 position: fixed;
 display: none;
}
#editar-produto:target{
 display: block;
}
#editar-produto:target ~ .box{
 top: 150px;
 transition: all .3s;
 transition-delay: .2s;
}
.box{
 width: 720px;
 height: 405px;
 position: absolute;
 margin-left: -360px;
 left: 50%;
 top: -410px;
 background-color: #e4e4e5;
}
#close{
 color: #fff;
 font-family: 'Arial';
 text-decoration: none;
 font-size: 35px;
 position: absolute;
 width: 40px;
 height: 40px;
 right: 0;
}

/***/
.campo-edicao-produto{
 float: left;
 width: 100%;
 margin-top: 20px;
 margin-left: 20px;
}

input.campo-form{
 width: 80%;
 margin: auto;
 font-size: 15px;
 border: 1px solid #ABB0B2;
 -webkit-border-radius: 3px;
 -moz-border-radius: 3px;
 border-radius: 3px;
 color: #343434;
 background-color: #fff;
 box-sizing: border-box;
 height: 32px;
 padding: 0px 0.4em;
 display: inline-block;
 margin: 0;
 vertical-align: top;
 border: 1px solid #c4c4c4 !important;
}
</style>

</head>
<body>

<a href="#editar-produto">editar</a>

<div id="editar-produto"></div>
<div class="box">
<a href="" id="close">x</a>
  <form method="post">

        <div class="campo-edicao-produto">
        <input type="text" class="campo-form" placeholder="id" required="" name="id">
        </div>

        <div class="campo-edicao-produto">
        <input type="text" class="campo-form" placeholder="Produto" required="" name="produto">
        </div>

        <div class="campo-edicao-produto">
        <input type="text" class="campo-form" placeholder="Descrição 1" required="" name="descricao1">
        </div>

        <div class="campo-edicao-produto">
        <input type="text" class="campo-form" placeholder="Descrição 2" required="" name="descricao2">
        </div>

        <div class="campo-edicao-produto">
        <input type="text" class="campo-form" placeholder="Descrição 3" required="" name="descricao3">
        </div>

        <input id="botao-salvar" type="submit" value="Salvar" name="cadastrar" />
  </form>
  
</div>

</body>
</html>