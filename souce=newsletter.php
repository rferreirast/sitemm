<link rel="stylesheet" href="css/style.css">
<style>
@media screen and (min-width:320px) {
.cadastrar{
 text-align: center;
}
/***/
input.email-cadastrar{
 font-size: 15px;
 border: 1px solid #ABB0B2;
 -webkit-border-radius: 3px;
 -moz-border-radius: 3px;
 border-radius: 3px;
 color: #343434;
 background-color: #fff;
 box-sizing: border-box;
 height: 25px;
 padding: 0px 0.4em;
 display: inline-block;
 margin: 0;
 width: 100%;
 vertical-align: top;
 margin-bottom: 5px;
 border: 1px solid #c4c4c4 !important;
}
.button-cadastrar{
 background: #fff !important;
 color: #014d8f !important;
 font-size: 12px !important;
 font-weight: bold !important;
 border: none;
 -webkit-border-radius: 3px;
 -moz-border-radius: 3px;
 border-radius: 3px;
 letter-spacing: .03em;
 box-sizing: border-box;
 height: 25px;
 line-height: 32px;
 padding: 0 10px;
 display: inline-block;
 margin: 0;
 cursor: pointer;
 width: 100%;
 transition: all 0.23s ease-in-out 0s;
}

}
/****** PARA O PC ******/

@media screen and (min-width:1025px) {

input.email-cadastrar{
 width: auto;;
 height: 30px ;
}
.button-cadastrar{
 height: 30px;
 width: auto;
}

}
	
</style>


 <div class="cadastrar">

    <p style="font-size: 15px !important; text-align: center; color: #fff;">Assine para receber promoçoes</p>

    <form method="post">

    <input type="email" class="email-cadastrar" placeholder="Insira seu e-mail..." required="" name="email-newsletter">
    <input type="submit" value="Inscrever-se" class="button-cadastrar" name="cadastrar-email">

    </form>

    <?php require 'system/cadastrar_newsletter.php'; ?>
 
 </div>
