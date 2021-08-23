<?php

/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

/**
 * if site is set to run on SSL, then force-enable SSL detection!
 */
if (stripos($_SERVER['SERVER_PROTOCOL'], 'https') === true) {
}
$_SERVER['HTTPS'] = 'on';

define('WP_HOME', 'https://' . $_SERVER['HTTP_HOST']);
define('WP_SITEURL', 'https://' . $_SERVER['HTTP_HOST']);

// ** MySQL-Einstellungen ** //
define('DB_NAME', 'template-wordpress');
define('DB_USER', 'root');
define('DB_PASSWORD', 'Ezcwz4KFWw4wb72v');
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
define('XAI_MAIL_PASSWORD', '86faqEbdqPzjBZh6');

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
define('AUTH_KEY',         '.3rZ,y,mQFt{4Mno6o8khz<VW%EVRF?n_5`y4}{y|qZ!=Vg$T0((/H-0 (9c`HII');
define('SECURE_AUTH_KEY',  '1/T -12+^1CN^i,]rfF?,g/z6DZgdjDia=l=u{6v[ZUFq1@+V]5CGSZ/XAdOiXy#');
define('LOGGED_IN_KEY',    'g|%ys:eC?@/d^|teG^Bk6sHCbrw1xB^V%HWEe_+Ow.ghUx,Gp7-]ALDTx:UHg~uB');
define('NONCE_KEY',        'a@?k-5{+YDp4t~+5n84fRh9KW)v>`pu0^(]2W#o3?,56fBdWY@p@_5oqouT9bD7~');
define('AUTH_SALT',        'mMe<<=e>CRCswQQ4#%Mex[:gpoK2>CRd.:z=V.% sKb7LV6:4,R=`]oZbL04*y/V');
define('SECURE_AUTH_SALT', 'lHn+)cRO8x*(ycp%C;I+MmD3+Z~.-qfF7/@.I`+!1Pvx]H@5`M!;~wQ5wa2U#$UU');
define('LOGGED_IN_SALT',   'S{79q{S*kQ3rG Y}t K-p#GgP5YOH5L9>nN{C)4|qOov,p+cvNL?PqK}7w.f/|T8');
define('NONCE_SALT',       'tjo0FI[>-G=mUy+l+BuNug+Jxl`U4Ae.*l)!`]3^%VfUqNW5r+r^3Zc;=Lr#EI|C');

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
