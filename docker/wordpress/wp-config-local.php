<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache




/**
 * if site is set to run on SSL, then force-enable SSL detection!
 */
if (stripos($_SERVER['SERVER_PROTOCOL'], 'https') === true) {
    $_SERVER['HTTPS'] = 'on';
}

define('WP_HOME', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']);
define('WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']);

// ** MySQL-Einstellungen ** //
define('DB_NAME', 'wordpress-local');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_HOST', 'template-mysql:3306');
define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', '');

define('WP_AUTO_UPDATE_CORE', false);
//define( 'WP_MEMORY_LIMIT', '128M');
//define( 'DISABLE_WP_CRON', 'true');

// mail settings
define('XAI_MAIL_HOST', 'template-postfix');
define('XAI_MAIL_PORT', 25);
define('XAI_MAIL_USER', 'mailer');
define('XAI_MAIL_PASSWORD', 'mailer');

define('FS_CHMOD_DIR', (0755 & ~ umask()));
define('FS_CHMOD_FILE', (0644 & ~ umask()));

/**#@+
 * Sicherheitsschlüssel
 *
 * Ändere jeden untenstehenden Platzhaltertext in eine beliebige,
 * möglichst einmalig genutzte Zeichenkette.
 * Auf der Seite {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * kannst du dir alle Schlüssel generieren lassen.
 * Du kannst die Schlüssel jederzeit wieder ändern, alle angemeldeten
 * Benutzer müssen sich danach erneut anmelden.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'wK y|bs [-jPD&$rTAuL_^tkFY&7a:Q:?i6wavypmAM5N_ITqke3f1snT UMeV0+');
define('SECURE_AUTH_KEY', '|Spdwp:RxJ4lfsO_J<GYmUEae,okfOt-.BjD2sQZHb=1u7oPa_w[=mdv!Ra1;a;~');
define('LOGGED_IN_KEY', '<_fV}.&B/q]/Z|,;?8RRnln_qs@>;Z]o2!?<Loa2)J%-q!QR1zhrR9}>Rus]N^$q');
define('NONCE_KEY', ',J2T4M$hH4`=]FdxA`kE$&G!.[B6=ETLU*;k2fI)%8e~m!@i1LdzTXw>=<6c$)Yk');
define('AUTH_SALT', '7k4zlh~P)QIa+;OStr+07Ry>DsQaB7pT]Xb;CC?@E1u$&9)I!oT/?D2#J{tq3pNR');
define('SECURE_AUTH_SALT', 'x7eNk0&u.]4L1?J1?Yj-kAbw4i=Z_d5JX%jolU!i{)?9v0}r^FqctkyE:qg5-MFC');
define('LOGGED_IN_SALT', 'y%Nsk%+Kj70k.t=x6Hc(fQSu^CdL,tlI_N[>!?o]BKO{ QYy>toK:*~ITK=eC8?]');
define('NONCE_SALT', '*|[Y`O#$+?/oBg0E=Np|TR#{%O;{L-NaR>I.fmP}$/|0hYs+Tp#AF=?B|[-{qvc!');

/**#@-*/

/**
 * WordPress Datenbanktabellen-Präfix
 *
 * Wenn du verschiedene Präfixe benutzt, kannst du innerhalb einer Datenbank
 * verschiedene WordPress-Installationen betreiben.
 * Bitte verwende nur Zahlen, Buchstaben und Unterstriche!
 */
$table_prefix  = 'wp_';

define('WP_DEBUG', false);

/* Das war’s, Schluss mit dem Bearbeiten! Viel Spaß beim Bloggen. */
/* That's all, stop editing! Happy blogging. */

/** Der absolute Pfad zum WordPress-Verzeichnis. */
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/');
}

/** Definiert WordPress-Variablen und fügt Dateien ein.  */
require_once(ABSPATH . 'wp-settings.php');



