<?php

define('BASE_DIR', __DIR__ . '/../');

$dotenv = Dotenv\Dotenv::createImmutable(BASE_DIR);
$dotenv->load();

require path('routes/web.php');