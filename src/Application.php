<?php

  namespace Glow\Foundation;

class Application extends Container {

  protected static $version;

  protected $basePath;

  protected $storagePath;

  protected $resourcePath;

  protected $container;

  protected $appName;

  protected $environment;

  public function __construct($basePath, $appName = "App") {
    $this->basePath = $basePath;
    $this->appName  = $appName;
    $this->bootstrapApplication();
  }

  public function version(){
    return $this->appName . " -  Version " . $this->version;
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
    $lines = file([$_DOCUMENT_ROOT] . '.env');
    $regex = "/([^,=]+)=([^,=])/";
    foreach ($lines as $line) {
      preg_match_all($regex, $line, $result);
      $this->environment = array_combine($r[0], $r[1]);
    }
  }

  public function env($key, $defaultValue){
    return searchEnv($key) || $defaultValue;
  }

  public function searchEnv($key){
    return array_search($this->enviroment, $key);
  }

}
