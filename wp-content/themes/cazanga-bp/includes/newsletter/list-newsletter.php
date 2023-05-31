<?php
if(isset($_GET['processed_values']) && $_GET['processed_values'] == 'download_csv'){
    $exportCSV = new export_table_to_csv('newsletter',';','newsletter');
    die();
}
add_action( 'admin_menu', 'my_admin_menu' );

function my_admin_menu() {
	add_menu_page( 'Newsletter', 'Newsletter', 'manage_options', 'p-newsletter', 'myplguin_admin_page', 'dashicons-email-alt', 6  );
}
function myplguin_admin_page(){
	global $wpdb;
	?>
	<div class="wrap">
		<h2>Newsletter</h2>
		<p>Lista de usuários cadastrados na newsletter.</p>
		<table class="wp-list-table widefat fixed striped newsletter">
			<thead>
				<tr>
					<th scope="col" class="manage-column column-email">Email</th>
					<th scope="col" class="manage-column column-dat_cadastro">Data de Cadastro</th>
				</tr>
			</thead>
			<tbody>
		<?php
			$p_news = $wpdb->get_results( "SELECT * FROM p_newsletter ORDER BY dat_cadastro DESC, nome ASC, email ASC" );

			if ($p_news){
				foreach ( $p_news as $p_cad ) {
					echo '<tr>';
					echo '<td class="email column-email" data-colname="Email">', sanitize_text_field($p_cad->email), '</td>';
					$dat_cad = explode(' ', $p_cad->dat_cadastro);
					echo '<td class="dat_cadastro column-dat_cadastro" data-colname="Data de Cadastro">', implode('/', array_reverse(explode('-', $dat_cad[0])) ), ' &agrave;s ', substr($dat_cad[1], 0, 5), '</td>';
					echo '</tr>';
				}
			}
			else
				echo '<tr><td colspan="2" align="center">Nenhum usuário cadastrado.</td></tr>';
		?>
			</tbody>
			<tfoot>
				<tr>
					<th scope="col" class="manage-column column-email">Email</th>
					<th scope="col" class="manage-column column-dat_cadastro">Data de Cadastro</th>
				</tr>
			</tfoot>
		</table>
		<p><a href="?page=p-newsletter&processed_values=download_csv" target="_blank">Exportar em CSV</a></p>
	</div>
	<?php
}