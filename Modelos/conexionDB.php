<?php 

	class ConexionDB
	{
		
		public function conectarDB(){

			$db = new PDO("mysql:host=localhost;dbname=clinica","root","");

			$db->exec("set names utf8");

			return $db;

		}

	}

?>