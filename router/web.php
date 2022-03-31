<?php 

require("./Controller/userCtl.php");
require("./Controller/PostmanagerCtrl.php");
require("./Kernel/Router.php");
$router = new Router();


$router->get('/user/{id}', [UserCtl::class,'__selectUser']);
$router->get('/postmanager', [PostmanagerCtrl::class,'PostmanagerCtrl']);