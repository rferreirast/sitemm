<style>
body{
 margin: 0;
}
@media screen and (min-width:320px) {
.contatos-left{
 position: fixed;
 top: 40%;
 width: 48px;
 right: 0;
 z-index: 1000;
 background: none;
}
.desktop{
 display: none;	
}
.mobile{
 display: block;	
}	
.cl-item{
 position: relative;
 display: block;
 width: 48px;
 margin: 0;
 outline-offset: -1px;
 text-align: center;
 float: right;
 transition: width .15s ease-in-out;
 overflow: hidden;
 background: #e8e8e8;
 z-index: 100030;
 cursor: pointer;	
}

#cl-whatsapp{font-size: 20px;color:#fff; background:#20B038; display: block; padding: 12px 0;}
#cl-facebook{font-size: 20px;color:#fff; background:#4e69a2; display: block; padding: 12px 0;}
#cl-email{font-size: 20px;color:#fff; background: #e67e22 ; display: block; padding: 12px 0;}

#cl-whatsapp:hover{ width: 80px; font-size: 25px; text-align: center;}
#cl-facebook:hover{ width: 80px; font-size: 25px; text-align: center;}
#cl-email:hover   { width: 80px; font-size: 25px; text-align: center;}

}

/****** PARA O PC ******/
@media screen and (min-width:1280px) {
.desktop{
 display: block;	
}
.mobile{
 display: none;	
}	
.contatos-left{
 top: 20%;
}

}
</style>


<div class="contatos-left">

		<div class="desktop"><a href="https://web.whatsapp.com/send?phone=+55(19)38188942&text=Olá! gostaria de solicitar um orçamento!" target="i_blank" class="cl-item" id="cl-whatsapp"><spam><i class="fab fa-whatsapp"></i></spam></a></div>

		<div class="mobile"><a href="https://api.whatsapp.com/send?phone=+55(19)38188942&text=Ol%C3%A1!%20gostaria%20de%20solicitar%20um%20or%C3%A7amento!" target="i_blank" class="cl-item" id="cl-whatsapp"><spam><i class="fab fa-whatsapp"></i></spam></a></div>

		<a href="https://www.messenger.com/t/mestremoveleiro" target="i_blank" class="cl-item" id="cl-facebook"><spam><i class="fab fa-facebook-messenger"></i></spam></a>

		<a href="mailto:contato@mestremoveleiro.com.br" target="i_blank" class="cl-item" id="cl-email"><spam><i class="far fa-envelope-open"></i></spam></a>

</div>