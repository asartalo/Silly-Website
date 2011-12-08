<?php

$projectRoot = realpath(__DIR__ . '/../../');

@define( 'MARKDOWN_EMPTY_ELEMENT_SUFFIX',  ">");

require_once $projectRoot . '/vendor/silex.phar';
require_once $projectRoot . '/vendor/markdown-extra-extended/markdown_extended.php';

$app = new Silex\Application();

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path'       => $projectRoot . '/src/views',
    'twig.class_path' => $projectRoot . '/vendor/Twig/lib',
));

$app->get('/', function() use($app, $projectRoot) {
    return $app['twig']->render('index.html.twig', array(
        'content' => MarkdownExtended(file_get_contents($projectRoot . '/vendor/Silly/README.md'))
    ));
});

return $app;