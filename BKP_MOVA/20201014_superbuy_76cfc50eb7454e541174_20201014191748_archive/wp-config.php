<?php
define('DB_NAME', '');
define('DB_USER', '');
define('DB_PASSWORD', '');
define('DB_HOST', '');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
define('AUTH_KEY',         '2g7f5IndbLwZ7rlaAiAh1VZQ6Fne50pR1gsWJlsM');
define('SECURE_AUTH_KEY',  'KtyjEzKct1Tq7GMQPufiKBz0omhZo5qJAZiQyvvr');
define('LOGGED_IN_KEY',    'mPGcthVuSTKyDmWWvnBxoG1k03e3ocj2w4jwN8bZ');
define('NONCE_KEY',        'pYw4eXJN6ssike9k5UMCY91wuKpTOvQHhiECruNX');
define('AUTH_SALT',        'IW2LeqVjv0pR70Sb4FVdhV8W79bzjKAmoQ7Xs7nq');
define('SECURE_AUTH_SALT', '5TqJdP3RZSIxMT78v954mOxnvH626zAQnREspgEP');
define('LOGGED_IN_SALT',   'O9nffMJrp0Eu8O1LsvexVxyqwuC1uQJlhbAxzdvi');
define('NONCE_SALT',       'YqaXqpm8cfThJrFq4AVDdTaWNNyV1oDWCZdY7EYe');
$table_prefix  = 'wp_0d84db0d0d_';
define('SP_REQUEST_URL', ($_SERVER['HTTPS'] ? 'https://' : 'http://') . $_SERVER['HTTP_HOST']);
define('WP_SITEURL', SP_REQUEST_URL);
define('WP_HOME', SP_REQUEST_URL);
/* Change WP_MEMORY_LIMIT to increase the memory limit for public pages. */
define('WP_MEMORY_LIMIT', '256M');
/* Uncomment and change WP_MAX_MEMORY_LIMIT to increase the memory limit for admin pages. */
//define('WP_MAX_MEMORY_LIMIT', '256M');
/* That's all, stop editing! Happy blogging. */
if ( !defined('ABSPATH') )
        define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');
