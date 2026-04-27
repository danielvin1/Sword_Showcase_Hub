<?php
/**
 * Azure App Service root bootstrap for Laravel.
 * Redirects all traffic into the public/ directory so the
 * application document root behaves as if it were public/.
 */
require __DIR__ . '/public/index.php';

