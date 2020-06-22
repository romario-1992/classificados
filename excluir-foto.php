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
	$id_anuncio = $a->excluirFoto($_GET['id']);
	$a->deleteFile($fileName);
}

if(isset($id_anuncio)) {
	header("Location: editar-anuncio.php?id=".$id_anuncio);
} else {
	header("Location: meus-anuncios.php");
}