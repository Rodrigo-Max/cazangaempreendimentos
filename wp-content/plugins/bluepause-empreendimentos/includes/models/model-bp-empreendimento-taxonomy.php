<?php
defined( 'ABSPATH' ) || exit;


class bpEmpreendimentoTaxonomy{
	public function __construct() {
    }

    function registerEmpreendimentoTaxonomy() {
        $labels = array(
            'name'              => _x( 'Categorias', '' ),
            'singular_name'     => _x( 'Categoria', '' ),
            'search_items'      => __( 'Procurar Categoria' ),
            'all_items'         => __( 'Categorias' ),
            'parent_item'       => __( 'Categoria Pai' ),
            'parent_item_colon' => __( 'Categoria Pai:' ),
            'edit_item'         => __( 'Editar Categoria' ),
            'update_item'       => __( 'Atualizar Categoria' ),
            'add_new_item'      => __( 'Adicionar Nova Categoria' ),
            'new_item_name'     => __( 'Nova Categoria' ),
            'menu_name'         => __( 'Categorias' ),
        );
        $args = array(
            'labels' => $labels,
            'hierarchical' => true,
            'rewrite' => array('slug' => 'categoria-empreendimento', 'with_front' => false),
        );
        register_taxonomy( 'empreendimento_cat', 'empreendimento', $args );
        flush_rewrite_rules();
    }

    function getEmpreendimentoTaxonomyTemplate( $taxonomy_template = '' ) {
        if ( is_tax('empreendimento_cat') ) {
            $taxonomy_template = BP_EMPREENDIMENTOS_ABSPATH.'templates/taxonomy-empreendimento_cat.php';
        }
        return $taxonomy_template;
    }
}