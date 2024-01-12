<?php
	$servidor="localhost";
	$banco="dbsistema2";
	$usuario="root";
	$senha="";

	$pdo = new PDO("mysql:host=$servidor;dbname=$banco",$usuario,$senha);		
?>