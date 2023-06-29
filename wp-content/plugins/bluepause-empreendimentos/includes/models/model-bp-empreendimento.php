<?php
defined( 'ABSPATH' ) || exit;

class bpEmpreendimento{
    private $metaFields = array(
        array(
            'label'=> 'Shortcode:',
            'desc'  => 'Shortcode para o formulario de contato',
            'id'    => 'bp_empreendimento_shortcode',
            'type'  => 'textarea'
        ),
    );

	public function __construct() {
    }

    public static function registerPostType(){
        $labels = array(
            'name'                => __( 'Empreendimentos', '' ),
            'singular_name'       => __( 'Empreendimento', '' ),
            'add_new'             => __( 'Adicionar Nova', '' ),
            'add_new_item'        => __( 'Adicionar Nova Empreendimento', '' ),
            'edit_item'           => __( 'Editar Empreendimento', '' ),
            'new_item'            => __( 'Nova Empreendimento', '' ),
            'all_items'           => __( 'Todas os Empreendimentos', '' ),
            'view_item'           => __( 'Ver Empreendimento', '' ),
            'search_items'        => __( 'Pesquisar Empreendimentos', '' ),
            'not_found'           => __( 'Nenhuma Empreendimento encontrado', '' ),
            'not_found_in_trash'  => __( 'Nenhuma Empreendimento na Lixeira', '' ),
            'menu_name'           => __( 'Empreendimentos', '' ),
        );

        $supports = array( 'title', 'editor', 'thumbnail' );

        $args = array(
            'labels'              => $labels,
            'public'              => true,
            'publicly_queryable'  => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'query_var'           => true,
            'rewrite'             => array( 'slug' => __('empreendimento', 'bp-empreendimento') ),
            'capability_type'     => 'post',
            'taxonomies'          => array (),
            'has_archive'         => true,
            'hierarchical'        => false,
            'menu_position'       => 4,
            'supports'            => $supports,
            'taxonomies' => array(),
            'menu_icon' => 'dashicons-location',
        );

        register_post_type( 'empreendimento', $args );

        flush_rewrite_rules();
    }

	public function mensagensAdminEmpreendimento( $messages ) {
		global $post, $post_ID;
		$messages['empreendimento'] = array(
			0 => '',
			1 => sprintf( __('Empreendimento atualizado. <a href="%s">Ver Empreendimento</a>'), esc_url( get_permalink($post_ID) ) ),
			2 => __('Campo personalizado atualizado.'),
			3 => __('Campo personalizado excluído.'),
			4 => __('Empreendimento atualizado.'),
			5 => isset($_GET['revision']) ? sprintf( __('Restaura o Empreendimento para revisão de %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6 => sprintf( __('Empreendimento publicado. <a href="%s">Ver Empreendimento</a>'), esc_url( get_permalink($post_ID) ) ),
			7 => __('Empreendimento salvo.'),
			8 => sprintf( __('Empreendimento enviado. <a target="_blank" href="%s">Visualizar Empreendimento</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
			9 => sprintf( __('Empreendimento agendado por: %1$s. <a target="_blank" href="%2$s">Visualizar Empreendimento</a>'), date_i18n( __( 'd/m/Y ás G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
			10 => sprintf( __('Rascunho da Empreendimento atualizado. <a target="_blank" href="%s">Visualizar Empreendimento</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		);
		return $messages;
	}

    public function alteraPlaceholder( $title ){
        $screen = get_current_screen();
        if( isset( $screen->post_type ) ) {
            if  ( 'empreendimento' == $screen->post_type ) {
                $title = 'Digite o nome da Empreendimento aqui';
            }
        }
        return $title;
    }

    public function getSingleEmpreendimentoTemplate( $template ) {
        global $post;

        if ($post->post_type == 'empreendimento'){
            $plugin_path = BP_EMPREENDIMENTOS_ABSPATH.'templates/';

            $template_name = 'single-empreendimento.php';

            if(file_exists(locate_template($template_name)) || !file_exists($plugin_path . $template_name)) {
                return $template;
            }

            return $plugin_path . $template_name;
        }

        return $template;
    }

    public function getArchiveEmpreendimentoTemplate( $archive_template ) {
         global $post;

         if ( is_post_type_archive ( 'empreendimento' ) && !file_exists(locate_template('archive-empreendimento.php'))) {
               $archive_template = BP_EMPREENDIMENTOS_ABSPATH.'templates/archive-empreendimento.php';
         }
         return $archive_template;
    }
}