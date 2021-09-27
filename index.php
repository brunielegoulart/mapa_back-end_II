<?php


function loadController($nameController, $nameFunction = "index")
{
    $nameController .= "controller";
    require_once('Controllers/'.$nameController.'.php');

    $controller = new $nameController();
    $controller->$nameFunction();
}


if(isset($_GET['c'])){
    $nameController = $_GET['c'];

    if(isset($_GET['f']))
       loadController($nameController, $_GET['f']);
    else
        loadController($nameController);
}else{
    loadController('course');
}
