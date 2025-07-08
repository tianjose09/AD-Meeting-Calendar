<?php

require_once VENDOR_PATH . '/autoload.php';

// ✅ Load .env from BASE_PATH
$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->load();

$envPath = BASE_PATH . '/.env';
if (!file_exists($envPath)) {
    die("❌ .env file not found at: $envPath");
}

// ✅ Check required environment keys
$requiredKeys = ['PG_HOST', 'PG_PORT', 'PG_DB', 'PG_USER', 'PG_PASS', 'MONGO_URI', 'MONGO_DB'];
foreach ($requiredKeys as $key) {
    if (!isset($_ENV[$key])) {
        die("❌ Missing ENV key: $key");
    }
}

// ✅ Store parsed ENV values
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

// ✅ Expose PG config globally for other files (e.g., DBConnection)
global $pgConfig;
$pgConfig = [
    'host' => $typeConfig['pg_host'],
    'port' => $typeConfig['pg_port'],
    'db'   => $typeConfig['pg_db'],
    'user' => $typeConfig['pg_user'],
    'pass' => $typeConfig['pg_pass'],
];
