<?php

	class Produto {
		var $id_prod;
		var $nome_prod;
		var $quantidade;
		var $datac;
		var $preco_de_compra_total;
		var $preco_de_venda_unitario;
		var $preco_de_venda_total;

		
		function getId_prod(){
			return $this->id_prod;
		}
		function setId_prod($id_prod){
			$this->id_prod = $id_prod;
		}

		function getNome_prod(){
			return $this->nome_prod;
		}
		function setNome_prod($nome_prod){
			$this->nome_prod = $nome_prod;
		}

		function getQuantidade(){
			return $this->quantidade;
		}
		function setQuantidade($quantidade){
			$this->quantidade = $quantidade;
		}

		function getDatac(){
			return $this->datac;
		}
		function setDatac($datac){
			$this->datac = $datac;
		}

		function getPreco_de_compra_unitario(){
			return $this->preco_de_compra_unitario;
		}
		function setPreco_de_compra_unitario($preco_de_compra_unitario){
			$this->preco_de_compra_unitario = $preco_de_compra_unitario;
		}

		function getPreco_de_compra_total(){
			return $this->preco_de_compra_total;
		}
		function setPreco_de_compra_total($preco_de_compra_total){
			$this->preco_de_compra_total = $preco_de_compra_total;
		}

		function getPreco_de_venda_unitario(){
			return $this->preco_de_venda_unitario;
		}
		function setPreco_de_venda_unitario($preco_de_venda_unitario){
			$this->preco_de_venda_unitario = $preco_de_venda_unitario;
		}

		function getPreco_de_venda_total(){
			return $this->preco_de_venda_total;
		}
		function setPreco_de_venda_total($preco_de_venda_total){
			$this->preco_de_venda_total = $preco_de_venda_total;
		}
	}
	
	class ProdutoDAO {
	function create($produto) {
		$result = array();
		$nome_prod = $produto->getNome_prod();
		$quantidade = $produto->getQuantidade();
		$datac = $produto->getDatac();
		$preco_de_compra_unitario = $produto->getPreco_de_compra_unitario();
		$preco_de_venda_unitario = $produto->getPreco_de_venda_unitario();
		$query = "INSERT INTO produto (nome_prod, quantidade, datac, preco_de_compra_unitario, preco_de_venda_unitario) VALUES ('$nome_prod', '$quantidade', '$datac', '$preco_de_compra_unitario', '$preco_de_venda_unitario')";
	
		try {
	
				$con = new Connection();

				if(Connection::getInstance()->exec($query) >= 1){
					$result["id_prod"] = Connection::getInstance()->lastInsertId();	
				}

			
			}catch(PDOException $e) {
				$result["err"] = $e->getMessage();
			}

			return $result;
		}

		function readAll(){
			$query = "SELECT * FROM produto";
			try{
				$result = array();
				$con = new Connection();
				$resultSet = Connection::getInstance()->query($query);
					while($row = $resultSet->fetchObject()){
						$produto = new Produto();
						$produto->setId_prod($row->id_prod);
						$produto->setNome_prod($row->nome_prod);          
						$produto->setQuantidade($row->quantidade);
						$produto->setDatac($row->datac);          
						$produto->setPreco_de_compra_unitario($row->preco_de_compra_unitario);
						$produto->setPreco_de_compra_total($row->preco_de_compra_total);
						$produto->setPreco_de_venda_unitario($row->preco_de_venda_unitario);
						$produto->setPreco_de_venda_total($row->preco_de_venda_total);
						$result[] = $produto; 
					}
				}catch(PDOException $e) {
					$result["error"] = "Erro de conexão com o BD:"+$e->getMessage();
				}
			return $result;	
		}

		function read($id_prod) {
			$result = array();

			try {
				$query = "SELECT * FROM produto WHERE id_prod = $id_prod";
				
				$con = new Connection();

				$resultSet = Connection::getInstance()->query($query);

				while($row = $resultSet->fetchObject()){
					$produto = new Produto();
					$produto->setId_prod($row->id_prod);
					$produto->setNome_prod($row->nome_prod);          
					$produto->setQuantidade($row->quantidade);
					$produto->setDatac($row->datac);          
					$produto->setPreco_de_compra_unitario($row->preco_de_compra_unitario);
					$produto->setPreco_de_compra_total($row->preco_de_compra_total);
					$produto->setPreco_de_venda_unitario($row->preco_de_venda_unitario);
					$produto->setPreco_de_venda_total($row->preco_de_venda_total);
					$result[] = $produto;
				}
			}catch(PDOException $e) {
				$result["Erro de conexão com o BD"] = $e->getMessage();
			}

			return $result;
		}

		function update($produto) {
			$result = array();

			try {
				$id_prod = $produto->getId_prod();//Configura os parâmetros para montar a query
				$nome_prod = $produto->getNome_prod();//Configura os parâmetros para montar a query
				$quantidade = $produto->getQuantidade();
				$datac = $produto->getDatac();
				$preco_de_compra_unitario = $produto->getPreco_de_compra_unitario();
				$preco_de_venda_unitario = $produto->getPreco_de_venda_unitario();
				$con = new Connection();
				$query = "UPDATE produto SET nome_prod = '$nome_prod', quantidade = '$quantidade', datac = '$datac', preco_de_compra_unitario = '$preco_de_compra_unitario', preco_de_venda_unitario = '$preco_de_venda_unitario'  WHERE id_prod = $id_prod";
				
				$status = Connection::getInstance()->prepare($query);
				echo $query;
				
				if($status->execute()){
					$result["obj"] = $produto;				
					$result["msg"] = "Atualizado...";
				}else{
					$result["msg"] = "Erro ao atualizar";
				}	 
			}catch(PDOException $e) {
				$produtos["error"] = "Erro de conexão com BD";
			}

			return $result;
		}

		function delete($id_prod) {
			$result = array();

			try {
				$query = "DELETE FROM produto WHERE id_prod = $id_prod";

				$con = new Connection();

				if(Connection::getInstance()->exec($query) >= 1){
					$result["mensagem"] = "Pessoa excluída com sucesso";
				} else {
					$result["erro"] = "Este produto não pode ser excluído";
				}

				$con = null;
			}catch(PDOException $e) {
				$result["erro"] = "Erro de conexão com o BD";	
			}

			return $result;
		}
	}
