<?php

  namespace Glow\Foundation;

  require_once __DIR__ . "/../index.php";

  class Container {

    protected static $version = "0.0.0";

    // eval(\Psy\sh());

    function __construct() {}

    public function version(){
      return $this->version;
    }



  }

?>
