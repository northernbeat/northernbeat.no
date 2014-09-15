<?php
/**
 * Grunnkonfigurasjonen til WordPress.
 *
 * Denne filen inneholder følgende konfigurasjoner: MySQL-innstillinger, tabellprefiks,
 * hemmelige nøkler, WordPress-språk og ABSPATH. Du kan finne mer informasjon
 * ved å besøke {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex-siden. Du kan få MySQL-innstillingene fra din nettjener.
 * 
 * Denne filen brukes av koden som lager wp-config.php i løpet av
 * installasjonen. Du trenger ikke å bruke nettstedet til å gjøre det, du trenger bare
 * å kopiere denne filen til "wp-config.php" og fylle inn verdiene.
 *
 * @package WordPress
 */

// ** MySQL-innstillinger - Dette får du fra din nettjener ** //
/** Navnet på WordPress-databasen */
define('DB_NAME', 'nbeatno');

/** MySQL-databasens brukernavn */
define('DB_USER', 'nbeatno');

/** MySQL-databasens passord */
define('DB_PASSWORD', 'bymeMO6');

/** MySQL-tjener */
define('DB_HOST', 'sql27.webhuset.no');

/** Tegnsettet som skal brukes i databasen for å lage tabeller. */
define('DB_CHARSET', 'utf8');

/** Databasens "Collate"-type. La denne være hvis du er i tvil. */
define('DB_COLLATE', '');

/**#@+
 * Autentiseringsnøkler og salter.
 *
 * Endre disse til unike nøkler!
 * Du kan generere nøkler med {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Du kan når som helst endre disse nøklene for å gjøre aktive cookies ugyldige. Dette vil tvinge alle brukere å logge inn igjen.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '<,hR-.kQ1n@><lMUbsvZa,Z#7opwp6EjMmi;7HziZ{^gX^$VJNE5Jg1I2z};<,`}');
define('SECURE_AUTH_KEY',  'DG=OX&m_@*47e3/jc7c^(J-+Jo/U;$[$1{N~C{P[J6EU$N{8uE@f?*}?<JKQU[dr');
define('LOGGED_IN_KEY',    '+N(Ju]U+zmLiufX,a?0H&4V[1;])<C%s(_U-F}n|]7RC=oA]6C?o|1*l1tG&j(>i');
define('NONCE_KEY',        'BaVuLT8XZ/ubZ?:b6+]h~RyA-Pv#wU8(4v+>x9$zOW i57S*RNO#|MYl,$VLzJZk');
define('AUTH_SALT',        'P9[mq.BEcyI~/I!Hbf]1/Jg9<{f5QKcdTl=j^wSQE-jDP=n{Bch4eimNv9lu`N!h');
define('SECURE_AUTH_SALT', '0d)V>6M[]ckz~1<]~=l:{3.uS(!C]4G!I!`T<%>*Mj.qOft2Jbm1WzgnG[ko<X=m');
define('LOGGED_IN_SALT',   '^o%QY|KhZJ/Bmp},nG7y+F)P`;p/ysI+q6/|UXi?BrA=L?/`K1jgj{?rN2R^[PY=');
define('NONCE_SALT',       '<dpf9N &hn^!lApZlUUW3i;FMMs4f:rHCVe(0TvL;O4)>|#H3YCzawd`tTB.Q-~%');

/**#@-*/

/**
 * WordPress-databasens tabellprefiks.
 *
 * Du kan ha flere installasjoner i en databasehvis du gir dem hver deres unike
 * prefiks. Kun tall, bokstaver og understrek (_), takk!
 */
$table_prefix  = 'wp_';

/**
 * WordPress-språk, forhåndsinnstilt til norsk (bokmål).
 *
 * Du kan endre denne linjen for å bruke WordPress på et annet språk. En tilsvarende MO-fil for
 * det valgte språket må installeres i wp-content/languages. For eksempel, installer
 * de.mo i wp-content/languages og sett WPLANG til 'de' for å aktivere språkstøtte
 * på tysk.
 */
define('WPLANG', 'nb_NO');

/**
 * For utviklere: WordPress-feilsøkingstilstand.
 *
 * Sett denne til "true" for å aktivere visning av meldinger under utvikling.
 * Det er sterkt anbefalt at innstikks- og tema-utviklere bruker WP_DEBUG
 * i deres utviklermiljøer.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
