<?php
require 'config.php';

// require 'libs/Auth.php';
// require 'libs/Database.php';
// require 'libs/Session.php';
// require 'libs/Bootstrap.php';
// require 'libs/Controller.php';
// require 'libs/Model.php';
// require 'libs/View.php';

// Use an autoloader!
function __autoload($class) {
require LIBS . $class .".php";  
}
$app = new Bootstrap();
