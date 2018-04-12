<style>

@media screen and (min-width:320px) {
 
.iten-pedido-mobile{
 background: #fff;
 border-bottom: 1px solid #c4c4c4;
 padding: 20px;
 margin-top: 10px;
 margin-bottom: 10px;
 border-radius: 5px;
}

.cont-sobreProduto-mobile{float: left; width: 100%; text-align: left;}

.qt_itens{float: left; text-align: left;}
input.qt_itens{float: left; margin: 0;}
input.qt_itens_atualizar{float: left; margin: 0;}

#produto{margin-top: 10px;}

#preco{text-align: left; margin: 0;}
#precoTotal{text-align: left; margin: 0;}

#Subtotal{margin-bottom: 5px;}

#button_excluirItem{margin-left: 0;}

}

</style>
		
		<div class="container-itens-pedido-mobile" style="width: 100%; float: left;">

			<div class="lista-itens-pedido-mobile mobile">

			<?php if (count($_SESSION['itens']) == 0) { 
				echo "<p>Carrinho Vazio</p>";
			}else{
				
				foreach ($_SESSION['itens'] as $idProduto => $quantidade) {
                $select = $conexao->prepare("SELECT * FROM produtos WHERE id=?");
				$select->bindParam (1,$idProduto);
				$select->execute();
				$produtos = $select->fetchAll();

				//$totalIten = number_format($produtos[0]["preco"] * $quantidade, 2,',','.');

                ?>

                <form method="post">

			    <div class="iten-pedido-mobile">	
                    
				    <div class="cont-imgProduto-mobile">
				    <img id="imagempedido" src="http://www.mestremoveleiro.com.br/produtos/img-produtos/<?php echo $produtos[0]["foto"]; ?>" alt="">
				    </div>
				    
				    <div class="cont-sobreProduto-mobile">			
					<p id="produto"><a href="mmp.php?produto=<?php echo $idProduto; ?>"><?php echo utf8_encode ($produtos[0]["nome"]); ?></a></p>
					<p id="preco">R$ <?php echo number_format($produtos[0]["preco"], 2,',','.'); ?></p>

					<div class="cont-qtd" style="float: left; width: 100%; margin-top: 5px; margin-bottom: 5px;">
					<p style="float: left; margin-right: 10px;">Qtd</p>					
					<input type="number" value="<?php echo $quantidade; ?>" class="qt_itens" name="qtd">
					<input type="submit" value="🔃" class="qt_itens_atualizar" name="atualiza_quantidades">
					<input type="text" value="<?php echo $idProduto; ?>" class="zero" name="idprod">
					</div>

					<p id="Subtotal">Subtotal: R$ <?php echo number_format($produtos[0]["preco"] * $quantidade, 2,',','.'); ?></p>
					
					</div>

					<div class="cont-buttons-mobile">
					<a href="itens-pedido.php?removeItem=<?php echo $produtos[0]["id"]; ?>" id="button_excluirItem">✘ remover item</a>
					</div>

				</div>

				</form>

				<?php }}?>

			</div>
		</div>