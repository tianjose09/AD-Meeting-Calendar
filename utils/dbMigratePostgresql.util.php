<?php
declare(strict_types=1);

// ✅ Load bootstrap to define BASE_PATH, UTILS_PATH, etc.
require_once 'bootstrap.php';

// ✅ Load dependencies and env
require_once BASE_PATH . '/vendor/autoload.php';
require_once UTILS_PATH . '/envSetter.util.php';

// ✅ Connect to PostgreSQL
$dsn = "pgsql:host={$pgConfig['host']};port={$pgConfig['port']};dbname={$pgConfig['db']}";
$pdo = new PDO($dsn, $pgConfig['user'], $pgConfig['pass'], [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

echo "✅ Connected to PostgreSQL via PDO\n";

// ✅ Drop old tables
echo "🧨 Dropping old tables…\n";
foreach (['meeting_users', 'tasks', 'meeting', 'users'] as $table) {
  $pdo->exec("DROP TABLE IF EXISTS {$table} CASCADE;");
  echo "❌ Dropped table: {$table}\n";
}

// ✅ Apply updated schemas
$schemas = [
  'user.model.sql',
  'meeting.model.sql',
  'meeting_user.model.sql',
  'tasks.model.sql',
];

foreach ($schemas as $file) {
  $path = BASE_PATH . '/database/' . $file;
  echo "📄 Applying schema from {$path}…\n";
  $sql = file_get_contents($path);
  if ($sql === false) {
    throw new RuntimeException("❌ Could not read {$path}");
  } else {
    echo "✅ Creation Success from {$path}\n";
  }
  $pdo->exec($sql);
}

echo "🎉 Migration complete!\n";
