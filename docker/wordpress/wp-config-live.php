<?php
/*
    __________    _____  .___________ __________ ________  ____  ______________ _________
    \______   \  /  _  \ |   \______ \\______   \\_____  \ \   \/  /\_   _____//   _____/
     |       _/ /  /_\  \|   ||    |  \|    |  _/ /   |   \ \     /  |    __)_ \_____  \
     |    |   \/    |    \   ||    `   \    |   \/    |    \/     \  |        \/        \
     |____|_  /\____|__  /___/_______  /______  /\_______  /___/\  \/_______  /_______  /
            \/         \/            \/       \/         \/      \_/        \/        \/

              RAIDBOXES - Premium Managed WordPress Hosting

              Bei Fragen bitte support@raidboxes.de kontaktieren.
              If you have questions, contact us via support@raidboxes.io.
*/

define('WP_HOME',               'https://wirvantes.de');
define('WP_SITEURL',            'https://wirvantes.de');

define('FS_METHOD',             'direct');
define('WP_MEMORY_LIMIT',       '256M');
define('WP_MAX_MEMORY_LIMIT',   '256M');
define('WP_CACHE',              file_exists(dirname(__FILE__).'/wp-content/advanced-cache.php'));

define('DB_HOST',               'localhost');
define('DB_USER',               'wordpressuser');
define('DB_PASSWORD',           'geheim');
define('DB_NAME',               'wordpress');
define('DB_CHARSET',            'utf8');
define('DB_COLLATE',            '');

define('AUTH_KEY',              '0gO0oCqg0vVt3qyIJMb6wIVer2NM_dS4xPs_tdA2iS7s8DceUGYcxcM0QsHRhePa');
define('SECURE_AUTH_KEY',       'F284pWJVkfQjjFrWWTdZ_5s48ayaXvtqdAW8qZimm_SAy7qGiGAhwc2pHcEvdt5V');
define('LOGGED_IN_KEY',         'RnJPbr7MZ4xaXQVO8LoPRRVF4ETZO9NVp5rzdmba25ZrtuoHlEdwdTReuIcZyt8V');
define('NONCE_KEY',             'Os7c7SVPrQB7VuugFA6TDlUshhiVHCtesOWR1wJzTAH6lGFuTfa0FyFeSkhzX7zy');
define('AUTH_SALT',             'I5XmHoIEdRFfSYFHpA0JMVbkn6T2uzW_hWFjgcmyIkQOberp2XToN5U7J9Szv_rW');
define('SECURE_AUTH_SALT',      'xwdujmSLedMi4oPbW2qhq6mRwCT4fMJ8oGEb3tGQ1qbZxR8tFt_8YMffEgCVLkTa');
define('LOGGED_IN_SALT',        '8Xh2YGzqXtXGa9Vp7iiuGw78LgyXDdzjCcatpE0oBBARRExrLZkUL98nciR5m2hp');
define('NONCE_SALT',            'ywSbajyyRQWUF5qtcd1gGT72VCXRQYjEOzHt69veVb80Wc5s8QlSIg5mo3nGwWG0');

$table_prefix =                 'wp_wkqthteyko_';

define('DISABLE_WP_CRON',       false);

define('WP_DEBUG',              'false' === 'true');
define('WP_DEBUG_LOG',          true);
define('WP_DEBUG_DISPLAY',      false);

putenv('TMPDIR = /tmp');
define('WP_TEMP_DIR',           '/tmp');

define('WP_ENV',                'production');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

?>