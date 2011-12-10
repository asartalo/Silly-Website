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

function getMarkDownText($file) {
    $content = file($file);
    array_shift($content);
    return implode("", $content);
}

$app->get('/', function() use($app, $projectRoot) {
    return $app['twig']->render('index.html.twig', array(
        'content' => MarkdownExtended(
            getMarkDownText($projectRoot . '/vendor/Silly/README.md')
        )
    ));
});

return $app;