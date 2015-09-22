<?php

namespace Glow\Foundation;

class Application {

  protected static $version = "0.0.0";

  protected $basePath;

  protected $storagePath;

  protected $resourcePath;

  protected $container;

  protected $appName;

  protected $environment;

  public function __construct($container, $basePath, $appName = "App") {
    $this->basePath = $basePath;
    $this->container = $container;
    $this->appName  = $appName;
    // $this->bootstrapApplication();
  }

  public function version(){
    return $this->appName . " - Version " . self::$version;
  }

  public function getAppName(){
    return $this->appName;
  }

  public function registerPaths(){
    $this->basePath     = __DIR__;
    $this->storagePath  = $this->basePath . '/storage/';
    $this->resourcePath = $this->basePath . '/public/';
  }

  public function bootstrapApplication(){
    $this->dotEnv();
  }

  public function dotEnv(){
    $this->environment = new \Dotenv\Dotenv($this->basePath);
    $this->environment->load();
  }

  public function show($key, $defaultValue = null){
    if(!isset($this->environment)){
      $this->dotEnv();
    }

    $value = getenv($key);
    return ($value == false ? $defaultValue : $value);

  }

}

?>
