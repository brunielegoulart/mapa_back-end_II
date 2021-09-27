<?php

 require_once('IController.php');
 require_once('Model/course.php');

class courseController implements IController {

    private $model;

    public function __construct()
    {
        $this->model = new course();
    }

    public function index()
    {
        $result = $this->model->findAll();

        include('Views/pageHeader.php');
        include('Views/courseList.php');
        include('Views/pageFooter.php');
    }

    public function add()
    {
        echo " Adicionar curso ";
    }

}