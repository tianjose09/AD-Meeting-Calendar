<?php
if (!defined('BASE_PATH')) {
    define('BASE_PATH', dirname(__DIR__));
}

require_once BASE_PATH . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->load();

$envPath = BASE_PATH . '/.env';
if (!file_exists($envPath)) {
    die("❌ .env file not found at: $envPath");
}

$requiredKeys = ['PG_HOST', 'PG_PORT', 'PG_DB', 'PG_USER', 'PG_PASS', 'MONGO_URI', 'MONGO_DB'];
foreach ($requiredKeys as $key) {
    if (!isset($_ENV[$key])) {
        die("❌ Missing ENV key: $key");
    }
}

$typeConfig = [
    'env_name'   => $_ENV['ENV_guinto'] ?? 'local',

    'pg_host'    => $_ENV['PG_HOST'],
    'pg_port'    => $_ENV['PG_PORT'],
    'pg_db'      => $_ENV['PG_DB'],
    'pg_user'    => $_ENV['PG_USER'],
    'pg_pass'    => $_ENV['PG_PASS'],

    'mongo_uri'  => $_ENV['MONGO_URI'],
    'mongo_db'   => $_ENV['MONGO_DB'],
];
