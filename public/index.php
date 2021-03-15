<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

require_once __DIR__ . '/../conf/conf.inc.php';
require_once __DIR__.'/../bootstrap/autoload.php';

require_once __DIR__ . '/../core/App.php';

$app = new \Core\App();

$app->run();
