<?php

 private $pref = 'media_';

	 private function existe($id){

	 	if (!isset($_SESSION[$this->pref.'produto'])) {
	 		
	 		$_SESSION[$this->pref.'produto'] = array();
	 	}

	 	if (!isset($_SESSION[$this->pref.'produto'][$id])) {
	 		return false;
	 	}else{
	 		return true;
	 	}
	 }//VERIFICA A EXISTENCIA DO PRODUTO E DA SESSION COMO ARRAY

	 public function verificaAdiciona($id){
	 	if (!$this->existe($id)) {
	 		$_SESSION[$this->pref.'produto'][$id] = 1;	 		
	 	}else{
	 		$_SESSION[$this->pref.'produto'][$id] += 1;
	 	}
	 }//verifica e adiciona mais um produt ao carrinho

	 private function prodExiste($id){
	 	if (isset($_SESSION[$this->pref.'produto'][$id])) {
	 		return true;
	 	}else{
	 		return false;
	 	}
	 }// VERIFICA SE O PRODUTO EXISTE

	 public function deletarProduto($id){
	 	if (!$this->prodExiste($id)) {
	 		return false;
	 	}else{
	 		unset($_SESSION[$this->pref.'produto'][$id]);
	 		return true;
	 	}
	 }//DELETA PRODUTO DA LISTA DE PEDIDO

	 private function isArray($post){
	 	if (is_array($post)) {
	 		return true;
	 	}else{
	 		return false;
	 	}
	 }//VERIFICA SE O POST PASSADO POR PARAMETRO É OU NAO UM ARRAY

	 public function atualizaQuantidades($post){

	 	if ($this->isArray($post)) {
	 		foreach ($post as $id => $qtd) {
	 			$id = (int)$id;
	 			$qtd = (int)$qtd;

	 			if ($qtd != '') {
	 				$_SESSION[$this->pref.'produto'][$id] = $qtd;
	 			}else{
	 				unset($_SESSION[$this->pref.'produto'][$id]);
	 			}
	 		}
	 		return true;
	 	}else{
	 		return false;
	 	}//se nao for um array
	 }//deleta ou atualiza quantidades no carrinho de compras


	 public function qtdProdutos(){
	 	return count($_SESSION[$this->pref.'produto']);

	 }


 ?>