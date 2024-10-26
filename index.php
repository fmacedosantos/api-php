<?php

// A pasta do projeto deve ficar em xampp/htdocs

require_once __DIR__.'/core/Core.php';
require_once __DIR__.'/router/routes.php';

$core = new Core();
$core->run($routes);