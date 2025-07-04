<?php
require('config.php');

//class bootstrap
require('classes/Bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');
//controllers
require('controllers/home.php');
require('controllers/articles.php');
require('controllers/users.php');

//model
require('models/home.php');
require('models/articles.php');
require('models/users.php');





$bootstrap=new Bootstrap($_GET);
$controller=$bootstrap->createController();

//controllers
if($controller){
    $controller->executeAction();
}






?>