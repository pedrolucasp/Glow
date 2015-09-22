<?php

  namespace Glow\Foundation;

  class Container {

    protected static $version = 0.0.0;

    function __construct() {}

    public function version(){
      return $this->version;
    }

    

  }

?>
