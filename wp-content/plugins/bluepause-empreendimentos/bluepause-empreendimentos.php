<?php
/**
 * Plugin Name: BluePause Empreendimentos
 * Description: Cadastro de Empreendimentos personalizados para a Cazanga Empreendimentos.
 * Plugin URI: https://bp360.com.br/
 * Author: Agência BluePause
 * Version: 0.0.5
 * Author URI: https://bp360.com.br/
 *
 * Text Domain: bp-empreendimentos
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! defined( 'BP_EMPREENDIMENTOS_PLUGIN_FILE' ) )
	define( 'BP_EMPREENDIMENTOS_PLUGIN_FILE', __FILE__ );

if ( ! defined( 'BP_EMPREENDIMENTOS_PLUGIN_URL' ) )
	define('BP_EMPREENDIMENTOS_PLUGIN_URL', plugin_dir_url( __FILE__ ));

	if ( ! class_exists( 'bpEmpreendimentos' ) ) {
	include_once dirname( __FILE__ ) . '/includes/class-bp-empreendimentos.php';
}

function bpEmpreendimentos(){
	return bpEmpreendimentos::instance();
}

$GLOBALS['bpEmpreendimentos'] = bpEmpreendimentos();