<?php
defined( 'ABSPATH' ) || exit;

class bpEmpreendimentos{
	protected static $_instance = null;
	private $_version = '0.0.2';
    private $empreendimento;
	private $empreendimento_tax;

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

    public function __construct(){
        $this->defineConstants();
        $this->includes();
        $this->initHooks();
    }

    private function defineConstants(){
		$this->define( 'BP_EMPREENDIMENTOS_ABSPATH', dirname( BP_EMPREENDIMENTOS_PLUGIN_FILE ) . '/' );
    }

	private function define( $name, $value ) {
		if ( ! defined( $name ) ) {
			define( $name, $value );
		}
    }

    private function includes(){
		include_once BP_EMPREENDIMENTOS_ABSPATH . 'includes/functions-bp-empreendimento.php';
		include_once BP_EMPREENDIMENTOS_ABSPATH . 'includes/models/model-bp-empreendimento.php';
		include_once BP_EMPREENDIMENTOS_ABSPATH . 'includes/models/model-bp-empreendimento-taxonomy.php';
    }

    private function initHooks(){
		//register_activation_hook( BP_EMPREENDIMENTOS_PLUGIN_FILE, array( 'bpInstall', 'install' ) );

		add_action( 'init', array( $this, 'init' ), 0 );
    }

    public function init(){
		$this->empreendimento = new bpEmpreendimento();
		$this->empreendimento_tax = new bpEmpreendimentoTaxonomy();

		add_action( 'init', array( $this->empreendimento, 'registerPostType' ), 5 );
		add_action( 'init',  array( $this->empreendimento_tax, 'registerEmpreendimentoTaxonomy'), 10 );

		add_filter( 'enter_title_here', array($this->empreendimento, 'alteraPlaceholder') );
		add_filter( 'post_updated_messages', array( $this->empreendimento, 'mensagensAdminEmpreendimento' ) );

		add_filter( 'taxonomy_template', array( $this->empreendimento_tax, 'getEmpreendimentoTaxonomyTemplate') ) ;

		add_filter( 'single_template', array( $this->empreendimento, 'getSingleEmpreendimentoTemplate' ), 10, 1);
		add_filter( 'archive_template', array( $this->empreendimento, 'getArchiveEmpreendimentoTemplate' ), 10, 1 );
		add_action( 'wp_enqueue_scripts', array($this, 'enqueueScripts'), 200 );
	}

	public function enqueueScripts(){
		wp_register_style( 'empreendimentos-bp', BP_EMPREENDIMENTOS_PLUGIN_URL.'assets/css/bp-empreendimento-frontend.css', array(), $this->_version );
		wp_register_script( 'empreendimentos-bp', BP_EMPREENDIMENTOS_PLUGIN_URL.'assets/js/bp-empreendimento-frontend.js', array('jquery'), $this->_version, true );
		
		wp_register_style('slick-empreendimento-bp', BP_EMPREENDIMENTOS_PLUGIN_URL.'assets/js/slick/slick.css', false, $this->version);
		wp_register_script('slick-empreendimento-bp', BP_EMPREENDIMENTOS_PLUGIN_URL.'assets/js/slick/slick.min.js', array('jquery'), $this->version, true);
		
		wp_register_script('filmroll-empreendimento-bp', BP_EMPREENDIMENTOS_PLUGIN_URL.'assets/js/jquery.film_roll.min.js', array('jquery'), $this->version, true);

		if (is_front_page() || is_singular('empreendimento') || is_tax('empreendimento_cat') || is_post_type_archive( 'empreendimento' )){
			wp_enqueue_style('empreendimentos-bp');
		}

		if (is_singular('empreendimento') || is_tax('empreendimento_cat') || is_post_type_archive( 'empreendimento' )){
			wp_enqueue_style('slick-empreendimento-bp');
			wp_enqueue_script('slick-empreendimento-bp');
			//wp_enqueue_script('filmroll-empreendimento-bp');
			wp_enqueue_script('empreendimentos-bp');
		}
	}
	
	public static function plugin_url() {
		return untrailingslashit( plugins_url( '/', BP_EMPREENDIMENTOS_PLUGIN_URL ) );
	}

	public static function plugin_path() {
		return untrailingslashit( plugin_dir_path( BP_EMPREENDIMENTOS_PLUGIN_URL ) );
	}

	public static function template_path() {
		return untrailingslashit( BP_EMPREENDIMENTOS_PLUGIN_URL );
	}
}