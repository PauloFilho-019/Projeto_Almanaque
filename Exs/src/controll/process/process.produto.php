<?php

	require("../../domain/connection.php");
	require("../../domain/Produto.php");

	class ProdutoProcess {
		var $pd;

		function doGet($arr){
			$pd = new ProdutoDAO();
			if(isset($arr["id_prod"]) &&  $arr["id_prod"] != 0){
				$sucess = $pd->read($arr["id_prod"]);
			}else{
				$sucess = $pd->readAll();
			}
			//$sucess = "use to result to DAO";
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doPost($arr){
			$produto = new Produto();
			$produto->setNome_prod($arr["nome_prod"]);          
			$produto->setQuantidade($arr["quantidade"]);
			$produto->setDatac($arr["datac"]);          
			$produto->setPreco_de_compra_unitario($arr["preco_de_compra_unitario"]);
			$produto->setPreco_de_venda_unitario($arr["preco_de_venda_unitario"]);
			
			$pd = new ProdutoDAO();
			$sucess = $pd->create($produto);
			//$sucess = "use to result to DAO";
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doPut($arr){
			$pd = new ProdutoDAO();
			$produto = new Produto();
			$produto->setId_prod($arr["id_prod"]);
			$produto->setNome_prod($arr["nome_prod"]);          
			$produto->setQuantidade($arr["quantidade"]);
			$produto->setDatac($arr["datac"]);          
			$produto->setPreco_de_compra_unitario($arr["preco_de_compra_unitario"]);
			$produto->setPreco_de_venda_unitario($arr["preco_de_venda_unitario"]);
			$sucess = $pd->update($produto);
			//$sucess = "use to result to DAO";
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doDelete($arr){
			$pd = new ProdutoDAO();
			$id_prod = $arr["id_prod"];
			$sucess = $pd->delete($id_prod);
			//$sucess = "use to result to DAO";
			http_response_code(200);
			echo json_encode($sucess);
		}
	}