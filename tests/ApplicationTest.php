<?php

namespace Glow\Test;

use Glow\Foundation\Application;
use Glow\Foundation\Container;

class ApplicationTest extends \PHPUnit_Framework_TestCase {
  // Dummy test
  public function testVersion(){
    // Arrange
    $container = new Container();
    $app = new Application($container, "apps/");
    $appName = $app->getAppName();
    // Act
    $version = $app->version();

    // Assert
    $this->assertEquals("{$appName} - Version 0.0.0", $version);
  }

  public function testAppName(){
    $container = new Container();
    $dir = __DIR__ . "/../";
    $app = new Application($container, $dir, "MyApp");
    $this->assertEquals("{$app->getAppName()}", $app->getAppName());
  }

  public function testEnvironment(){
    $container = new Container();
    $dir = __DIR__ . "/../";
    $app = new Application($container, $dir);

    $content = "ENVIRONMENT=\"test\"";
    $fp = fopen(__DIR__ . "/../.env", "w");
    fwrite($fp, $content);
    fclose($fp);

    $value = $app->show('ENVIRONMENT');

    $this->assertEquals("test", $value);
  }

}
