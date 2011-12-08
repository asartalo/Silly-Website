<?php

$app = require realpath(__DIR__ . '/..') . '/src/app/app.php';

$app['debug'] = true;

$app->run();