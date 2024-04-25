<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link https://fr.wordpress.org/support/article/editing-wp-config-php/ Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'motaphoto' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'root' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Wt^AGM9$2Q_V%r!o.oK8P7Bwu1P|aI$O(vM>6Ut=6;TZEQ)B:f_EL5^wct<Wf+YB' );
define( 'SECURE_AUTH_KEY',  '7bDT.qcHKcN$1SI&2`DtU>]WiU84$`9.k[}~5_pVGlkr$qL#z!7v1bAM2_,[XURu' );
define( 'LOGGED_IN_KEY',    '0U3;]@ ],1MHn->W?d<*;nVhW>DelKIr#Pv-7zV/qNtm2h# =2Xs[Pl!kT0x` @>' );
define( 'NONCE_KEY',        '].XfGSYUnc?{o/Gz~)+9lY`B*kx^XIEU~gr,iiqBEOT4;-Ti)YX3&JCeW]4#l3ka' );
define( 'AUTH_SALT',        'MxPD3v<TI_si+aI2[maJ}=h;;@dZa+@)O_et`DBhp8B|GpDGssc@[,*wwg0:5/=F' );
define( 'SECURE_AUTH_SALT', '*S$`^_?R#BS~kZmM JC_OwCb62$ITq/2s;[cRU<SxY%EDB%W>kX3H +IqI[)jsYC' );
define( 'LOGGED_IN_SALT',   'c3J7Cn7#?Uf0QKD/q@:>tZ#EIw?)25tS:jN}=<D@si,0x8#wRCa2pg5L42sj{ul}' );
define( 'NONCE_SALT',       '?O/o3MVS@L]fPN5[3h][G63GL0!,:bIsitksFl:B5O*IRs3gKd`NXs:XnJL>Ym$a' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs et développeuses : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs et développeuses d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur la documentation.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', true);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');

ini_set('zlib.output_compression', 'Off');