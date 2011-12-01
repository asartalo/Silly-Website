<?php

require_once realpath(__DIR__ . '/../') . '/vendor/silex.phar';

$app = new Silex\Application();

$app->get('/', function() use($app) {
    return 'Hello World!';
});

$app['debug'] = true;

$app->run();