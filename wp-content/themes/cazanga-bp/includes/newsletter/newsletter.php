<?php
header('Content-type: application/json; charset=utf-8');

//require_once 'class.pdoconfig.php';

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

if (!defined('ABSPATH')){
	echo json_encode( array( 'error' => "Acesso indevido.", 'success' => '' ) );
	exit;
}

//Extrai os dados do formulário
extract($_GET);

//Verifica se os campos foram digitados
$Email = ($Email != "") ? $Email : "desconhecido";
$Nome = ($Nome != "") ? $Nome : "desconhecido";
$Empresa = ($Empresa != "") ? $Empresa : null;

$Email = sanitize_email($Email);
$Nome = sanitize_text_field($Nome);
$Empresa = sanitize_text_field($Empresa);

if($Email == "desconhecido" || $Nome == "desconhecido"){
	echo json_encode( array( 'error' => "Dados inválidos, tente novamente.", 'success' => '' ) );
	exit;
}
else{
	//date_default_timezone_set('America/Sao_Paulo');
	$data = date("Y-m-d H:i:s");

	global $wpdb;

	$rs = $wpdb->insert('p_newsletter', array(
			'email' => $Email,
			'nome' => $Nome,
			'empresa' => $Empresa,
			'dat_cadastro' => $data
		)
	);

	if ($rs){
		unset($Nome, $Email, $Empresa, $data);
		echo json_encode( array( 'error' => '', 'success' => '1' ) );
		exit;
	}
	else {
		$p_news = $wpdb->get_results( "SELECT * FROM p_newsletter WHERE email LIKE '$Email'" );
		if ($p_news)
			echo json_encode( array( 'error' => "Você já está cadastrado(a).", 'success' => '' ) );
		else
			echo json_encode( array( 'error' => "Não foi possível cadastrá-lo(a), tente novamente.", 'success' => '' ) );
		unset($p_news, $Nome, $Email, $data);
		exit;
	}
}

exit;
?>