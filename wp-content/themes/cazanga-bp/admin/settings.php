<?php
/**
 * Configure theme settings.
**/

add_filter( 'manage_posts_columns', 'revealid_add_id_column', 5 );
add_action( 'manage_posts_custom_column', 'revealid_id_column_content', 5, 2 );
add_filter( 'manage_pages_columns', 'revealid_add_id_column', 5 );
add_action( 'manage_pages_custom_column', 'revealid_id_column_content', 5, 2 );


function revealid_add_id_column( $columns ) {
   $columns['revealid_id'] = 'ID';
   return $columns;
}

function revealid_id_column_content( $column, $id ) {
  if( 'revealid_id' == $column ) {
    echo $id;
  }
}
add_action('admin_head', 'kjl_custom_admin_css');
function kjl_custom_admin_css() {
  echo '<style>
  .column-revealid_id {width: 5%}
  </style>';
}

add_action( 'init', 'bp_admin_init' );
add_action( 'admin_menu', 'bp_settings_page_init' );

function bp_admin_init() {
	$settings = get_option( "bp_theme_settings" );
	if ( empty( $settings ) ) {
		$settings = array(
			'bpParcelamento' => 1,
			'bpValorMinimo' => 0,
			'bpValorMaximo' => -1,
			'bpFacebook' => false,
			'bpInstagram' => false,
			'bpSoff' => 0,
		);
		add_option( "bp_theme_settings", $settings, '', 'yes' );
	}
}

function bp_settings_page_init() {
	$theme_data = wp_get_theme();
	$settings_page = add_theme_page( 'Opções do Tema', 'Opções do Tema', 'edit_theme_options', 'theme-settings', 'bp_settings_page' );
	add_action( "load-{$settings_page}", 'bp_load_settings_page' );
}

function bp_load_settings_page() {
	if ( !empty($_POST["bp-settings-submit"]) && $_POST["bp-settings-submit"] == 'Y' ) {
		check_admin_referer( "bp-settings-page" );
		bp_save_theme_settings();
		$url_parameters = isset($_GET['tab'])? 'updated=true&tab='.$_GET['tab'] : 'updated=true';
		wp_redirect(admin_url('themes.php?page=theme-settings&'.$url_parameters));
		exit;
	}
}

function bp_save_theme_settings() {
	global $pagenow;
	$settings = get_option( "bp_theme_settings" );

	if ( $pagenow == 'themes.php' && $_GET['page'] == 'theme-settings' ){
		if ( isset ( $_GET['tab'] ) )
	        $tab = $_GET['tab'];
	    else
	        $tab = 'cfggeral';

	    switch ( $tab ){
			case 'home' :
				$settings['bpCooperativas'] = $_POST['bpCooperativas'];
				$settings['bpPAs'] = $_POST['bpPAs'];
				$settings['bpCooperados'] = $_POST['bpCooperados'];
				$settings['bpSeguros'] = $_POST['bpSeguros'];
				$settings['bpAno'] = $_POST['bpAno'];
				$settings['bpAnoAtual'] = $_POST['bpAnoAtual'];
				$settings['bpPremioLiquido'] = $_POST['bpPremioLiquido'];
				$settings['bpComissaoTotal'] = $_POST['bpComissaoTotal'];
				$settings['bpPremioLiquidoAtual'] = $_POST['bpPremioLiquidoAtual'];
				$settings['bpComissaoAtual'] = $_POST['bpComissaoAtual'];
			case 'footer' :
				$settings['bpFacebook'] = $_POST['bpFacebook'];
				$settings['bpInstagram'] = $_POST['bpInstagram'];
				break;
			case 'cfggeral':
				$settings['bpSoff'] = (!empty($_POST['bpSoff']) ? 1 : 0);
				break;
			default:
	    }
	}

	$updated = update_option( "bp_theme_settings", $settings );
}

function bp_admin_tabs( $current = 'cfggeral' ) {
    $tabs = array('cfggeral' => 'Configurações Gerais', 'footer' => 'Rodapé', 'home' => 'Página Início' );
    $links = array();
    echo '<div id="icon-themes" class="icon32"><br></div>';
    echo '<h2 class="nav-tab-wrapper">';
    foreach( $tabs as $tab => $name ){
        $class = ( $tab == $current ) ? ' nav-tab-active' : '';
        echo "<a class='nav-tab$class' href='?page=theme-settings&tab=$tab'>$name</a>";
    }
    echo '</h2>';
}

function bp_settings_page() {
	global $pagenow;
	$settings = get_option( "bp_theme_settings" );
	$theme_data = wp_get_theme();
	?>

	<div class="wrap">
		<h2>Opções do Tema - <?php echo $theme_data['Name']; ?></h2>

		<?php
			if ( 'true' == esc_attr( $_GET['updated'] ) ) echo '<div class="updated" ><p>Opções do Tema atualizadas.</p></div>';

			if ( isset ( $_GET['tab'] ) ) bp_admin_tabs($_GET['tab']); else bp_admin_tabs('cfggeral');
		?>

		<div id="bp_options">
			<form method="post" action="<?php admin_url( 'themes.php?page=theme-settings' ); ?>">
				<?php
				wp_nonce_field( "bp-settings-page" );

				if ( $pagenow == 'themes.php' && $_GET['page'] == 'theme-settings' ){

					if ( isset ( $_GET['tab'] ) ) $tab = $_GET['tab'];
					else $tab = 'cfggeral';

					echo '<table class="form-table">';
					switch ( $tab ){
						case 'footer' :
				?>
							<tr>
								<th><label for="bpFacebook">URL do Facebook</label></th>
								<td>
									<input type="url" name="bpFacebook" id="bpFacebook" value="<?php echo ($settings['bpFacebook']); ?>" size="50" style="max-width: 100%;" />
								</td>
							</tr>
							<tr>
								<th><label for="bpInstagram">URL do Instagram</label></th>
								<td>
									<input type="url" name="bpInstagram" id="bpInstagram" value="<?php echo ($settings['bpInstagram']); ?>" size="50" style="max-width: 100%;" />
								</td>
							</tr>
				<?php
							break;
						case 'home':
							if (!$settings['bpAno'])
								$anoAnterior = date('Y') - 1;
							else
								$anoAnterior = $settings['bpAno'];

							if (!$settings['bpAnoAtual'])
								$anoAtual = date('Y');
							else
								$anoAtual = $settings['bpAnoAtual'];
				?>
							<tr>
								<th><label for="bpCooperativas">Cooperativas</label></th>
								<td>
									<input type="number" name="bpCooperativas" id="bpCooperativas" value="<?php echo ($settings['bpCooperativas']); ?>" size="50" style="max-width: 100%;" />
									<br><span class="description">Total de Cooperativas Sicoob atendidas. Somente números.</span>
								</td>
							</tr>
							<tr>
								<th><label for="bpPAs">PAs</label></th>
								<td>
									<input type="number" name="bpPAs" id="bpPAs" value="<?php echo ($settings['bpPAs']); ?>" size="50" style="max-width: 100%;" />
									<br><span class="description">Total de PAs das Cooperativas Sicoob atendidas. Somente números.</span>
								</td>
							</tr>
							<tr>
								<th><label for="bpCooperados">Cooperados</label></th>
								<td>
									<input type="number" name="bpCooperados" id="bpCooperados" value="<?php echo ($settings['bpCooperados']); ?>" size="50" style="max-width: 100%;" />
									<br><span class="description">Total de Cooperados protegidos. Somente números.</span>
								</td>
							</tr>
							<tr>
								<th><label for="bpSeguros">Seguros</label></th>
								<td>
									<input type="number" name="bpSeguros" id="bpSeguros" value="<?php echo ($settings['bpSeguros']); ?>" size="50" style="max-width: 100%;" />
									<br><span class="description">Total de Seguros comercializados. Somente números.</span>
								</td>
							</tr>
							<tr>
								<th><label for="bpAno">Ano Inicial</label></th>
								<td>
									<input type="number" name="bpAno" id="bpAno" value="<?php echo ($settings['bpAno']); ?>" size="50" style="max-width: 100%;" />
									<br><span class="description">Somente números. Ex.: <?php echo (date( "Y" ) - 1); ?></span>
								</td>
							</tr>
							<tr>
								<th><label for="bpAnoAtual">Ano Atual</label></th>
								<td>
									<input type="number" name="bpAnoAtual" id="bpAnoAtual" value="<?php echo ($settings['bpAnoAtual']); ?>" size="50" style="max-width: 100%;" />
									<br><span class="description">Somente números. Ex.: <?php echo date( "Y" ); ?></span>
								</td>
							</tr>
							<tr>
								<th><label for="bpPremioLiquido">Prêmio Líquido <?php echo $anoAnterior; ?></label></th>
								<td>
									<input type="number" name="bpPremioLiquido" id="bpPremioLiquido" value="<?php echo ($settings['bpPremioLiquido']); ?>" size="50" style="max-width: 100%;" />
									<br><span class="description">Valor total do Prêmio Líquido em <?php echo $anoAnterior; ?>. Somente números.</span>
								</td>
							</tr>
							<tr>
								<th><label for="bpComissaoTotal">Comissão Total <?php echo $anoAnterior; ?></label></th>
								<td>
									<input type="number" name="bpComissaoTotal" id="bpComissaoTotal" value="<?php echo ($settings['bpComissaoTotal']); ?>" size="50" style="max-width: 100%;" />
									<br><span class="description">Valor total da Comissão Recebida em <?php echo $anoAnterior; ?>. Somente números.</span>
								</td>
							</tr>
							<tr>
								<th><label for="bpPremioLiquidoAtual">Prêmio Líquido <?php echo $anoAtual; ?></label></th>
								<td>
									<input type="number" name="bpPremioLiquidoAtual" id="bpPremioLiquidoAtual" value="<?php echo ($settings['bpPremioLiquidoAtual']); ?>" size="50" style="max-width: 100%;" />
									<br><span class="description">Valor total do Prêmio Líquido em <?php echo $anoAtual; ?>. Somente números.</span>
								</td>
							</tr>
							<tr>
								<th><label for="bpComissaoAtual">Comissão Acumulada <?php echo $anoAtual; ?></label></th>
								<td>
									<input type="number" name="bpComissaoAtual" id="bpComissaoAtual" value="<?php echo ($settings['bpComissaoAtual']); ?>" size="50" style="max-width: 100%;" />
									<br><span class="description">Valor total da Comissão Acumulada Recebida em <?php echo $anoAtual; ?>. Somente números.</span>
								</td>
							</tr>
				<?php
							break;
						case 'cfggeral':
				?>
							<tr>
								<th><label for="bpSoff">Site em manutenção</label></th>
								<td>
									<label><input type="checkbox" name="bpSoff" id="bpSoff" value="1"<?php echo ($settings['bpSoff'] ? ' checked' : ''); ?> /> Marque a caixa para colocar site em modo de manutenção (somente administradores o verão).</label>
								</td>
							</tr>
				<?php
							break;
						default:
					}
					echo '</table>';
				}
				?>
				<p class="submit" style="clear: both;">
					<input type="submit" name="Submit"  class="button-primary" value="Salvar Alterações" />
					<input type="hidden" name="bp-settings-submit" value="Y" />
				</p>
			</form>
		</div>

	</div>
<?php
}
function enqueue_media_uploader(){
	global $pagenow;
	if ( $pagenow == 'themes.php' && $_GET['page'] == 'theme-settings' ){
		wp_enqueue_media();
		wp_enqueue_script('maskMoney', get_stylesheet_directory_uri().'/assets/js/jquery.maskMoney.min.js', array('jquery'), '3.1.1');
		wp_enqueue_script('admin-mask-parcelamento', get_stylesheet_directory_uri().'/assets/js/admin-mask-parcelamento.js', array('jquery'));
	}
}

add_action("admin_enqueue_scripts", "enqueue_media_uploader");