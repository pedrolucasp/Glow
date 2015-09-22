<?php

  namespace Glow\Components;
  /**
   * This is the Database Component
   * It will hold the full bridge between the Database itself and the
   * Application or Container instance;
   *
   * Man, this will be huge ;_;
   */

  use PDO;
  class Database {

    protected $instance;
    protected $sqlVersion;

    protected $driver;
    protected $name;
    protected $host;
    protected $username;
    protected $password;
    protected $charset = 'utf8';
    protected $collation = "utf8_unicode_ci";
    protected $prefix = '';


    public function addConnection(array $config){
      $this->driver    = $config['driver'];
      $this->name      = $config['name'];
      $this->host      = $config['host'];
      $this->user      = $config['user'];
      $this->password  = $config['password'];
      $this->charset   = $config['charset'];
      $this->collation = $config['collation'];
      $this->prefix    = $config['prefix'];
    }

    public function setPdo($name){
      $connection = null;
      try {
        $connection = new PDO("{$driver}:host={$host};dbname={$name}", $username, $password);
      } catch (PDOException $e){
        throw $e;
      }
      $this->instance = $connection;
    }

    public function getConnection(){
      return $this->instance;
    }


  }
?>
