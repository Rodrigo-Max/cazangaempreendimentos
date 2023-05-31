<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do banco de dados
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do banco de dados - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'cazanga' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'nEWxXB x7_KDKoiPDoi*eGouyU~_|2&Ma-5CXRJ;WKxBKaIg).~fP-jXevQU_MY=' );
define( 'SECURE_AUTH_KEY',  '{K:k[%1ea;2KnhkO1IAVb{7S:%ZcC&LHP AdWxhis2+9oHh1#URWDLl^),5cL;u)' );
define( 'LOGGED_IN_KEY',    '=WI6sO Lya=$KFr(,Xbd3CGBcaEm:ev{A9er|)F,R*G-VM/wjI87uk<g|ONn2F<@' );
define( 'NONCE_KEY',        '*0ljisY*N=2U_Jn5S|(=A&fR}t>x^Ip6QS|Lgc@m79{E&JTks{f|/L=grS;c3> ^' );
define( 'AUTH_SALT',        'QP>/bvcSsOxG1,O=6$oquB:C10;<Q%Tix?{[pSK$YF$0p(rUGAgG(Ub76kv$CpKw' );
define( 'SECURE_AUTH_SALT', '|?;R!+>TB~ZjiI]ka0Lty4TZEH>@Vy8wt$5br5tc0ixYo{hYVqPxu3MP$IW~Zb]D' );
define( 'LOGGED_IN_SALT',   'cti/BZffs+NqxyCvLDVdq0g00dl4sOlOV@wFZ)1Pkq>D7A>L7a@!2>Pr~8iZ:h5~' );
define( 'NONCE_SALT',       'Ec(2_I/<p9L#NZHKg*+!y?_|wFLCVIL#?-PzLJa0vQ%P.=74>V^#}}I>;EbIuyX~' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_cze_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Adicione valores personalizados entre esta linha até "Isto é tudo". */



/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
