<?php // File: config/app.php
declare(strict_types=1);

/**
 * Core app configuration constants.
 *
 * NOTE: This file deliberately avoids redefining BASE_PATH / BASE_URL if they
 * are already defined (for example by public/index.php). This prevents PHP
 * warnings and any output-before-headers issues.
 */

/* Application name and environment */
if (!defined('APP_NAME')) {
    define('APP_NAME', 'Inventory Optimization');
}
if (!defined('APP_ENV')) {
    define('APP_ENV', getenv('APP_ENV') ?: 'development');
}
if (!defined('APP_DEBUG')) {
    // In development show errors; in production set false.
    define('APP_DEBUG', true);
}

/* Base path and Base URL: only define if not already defined. */
if (!defined('BASE_PATH')) {
    // Try to compute from SCRIPT_NAME if available
    $scriptName = isset($_SERVER['SCRIPT_NAME']) ? str_replace('\\', '/', $_SERVER['SCRIPT_NAME']) : '';
    $scriptDir = $scriptName !== '' ? rtrim(dirname($scriptName), '/') : '';
    if ($scriptDir === '/' || $scriptDir === '.') {
        $scriptDir = '';
    }
    define('BASE_PATH', $scriptDir);
}

if (!defined('BASE_URL')) {
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    if (defined('BASE_PATH') && BASE_PATH !== '') {
        define('BASE_URL', rtrim($scheme . '://' . $host . BASE_PATH, '/'));
    } else {
        define('BASE_URL', rtrim($scheme . '://' . $host, '/'));
    }
}

/* Timezone (adjust if needed) */
if (!defined('APP_TIMEZONE')) {
    define('APP_TIMEZONE', 'Africa/Johannesburg');
}
date_default_timezone_set(APP_TIMEZONE);

/* Other global app settings */
if (!defined('DEFAULT_PER_PAGE')) {
    define('DEFAULT_PER_PAGE', 15);
}

/* You can add any other non-sensitive app-wide constants here. 
   Database credentials and connection should live in config/database.php */
