<?php
require 'config.php';
if(empty($_SESSION['cLogin'])) {
	header("Location: login.php");
	exit;
}

require 'classes/Anuncios.php';
$a = new Anuncios();

if(isset($_GET['id']) && !empty($_GET['id'])) {
	$fileName = $_GET['url'];
	if(file_exists("assets/images/anuncios/".$fileName)){
		$a->deleteFile($fileName);
		$a->excluirAnuncio($_GET['id']);
	}else{
		$a->excluirAnuncio($_GET['id']);
	}
	
}

header("Location: meus-anuncios.php");