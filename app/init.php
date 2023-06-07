<?php
require_once('config.php');

require_once('Core/App.php');
require_once('Core/Controller.php');
require_once('Core/Database.php');

require_once('Middlewares/CustomMiddlewares.php');

spl_autoload_register(function ($class) {
  require_once('Helpers/' . $class . '.php');
});
