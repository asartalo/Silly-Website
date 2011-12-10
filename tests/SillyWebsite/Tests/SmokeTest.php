<?php

namespace SillyWebsite\Tests;

use Silex\WebTestCase;

class SmokeTest extends WebTestCase {

  function createApplication() {
    $app = require realpath(__DIR__ . '/../../../') . '/src/app/app.php';
    $app['debug'] = true;
    unset($app['exception_handler']);

    return $app;
  }

  function testIndexPageIsWorking() {
    $client = $this->createClient();
    $crawler = $client->request('GET', '/');

    $this->assertTrue($client->getResponse()->isOk());
    $this->assertEquals(
      1, count($crawler->filter('h1:contains("Silly")')),
      'Did not find the correct header'
    );
    $this->assertEquals(1, count($crawler->filter('footer p:contains("Wayne Duran")')));
  }

}