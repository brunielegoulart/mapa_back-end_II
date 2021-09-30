<?php


require_once('IController.php');
require_once('Model/student.php');
require_once('Model/course.php');

class studentController implements IController {

    private $model;

    public function __construct()
    {
        $this->model = new student();

    }

    public function index()
    {
        $result = $this->model->findAll();

        $courseModel = new course();
        $courses = $courseModel->findAll();

        include('Views/pageHeader.php');
        include('Views/StudentList.php');
        include('Views/pageFooter.php');
    }

    public function add()
    {
        $courseModel = new course();
        $courses = $courseModel->findAll();

        include('Views/pageHeader.php');
        include('Views/studentForm.php');
        include('Views/pageFooter.php');
    }

    public function edit()
    {
        $courseModel = new course();
        $courses = $courseModel->findAll();
        
        if(isset($_GET['id'])){
            $result = $this->model->find($_GET['id']);
            if(count($result) > 0){

                $student = $result[0];
                include('Views/pageHeader.php');
                include('Views/studentForm.php');
                include('Views/pageFooter.php'); 

            }else{
                die("Aluno não encontrado!");
            }
        }else{
            die("ID não informado!");
        }
    }

    public function save()
    {
        if(isset($_GET['id']))
            $this->model->setId($_GET['id']);

        $this->model->setName($_POST['name']);
        $this->model->setEmail($_POST['email']);
        $this->model->setPassword($_POST['password']);
        $this->model->setPhone($_POST['phone']);
        $this->model->setCourse($_POST['course']);
        $this->model->setStatus($_POST['status']);

        if($this->model->save()){
            $_SESSION['message']['text'] = "Aluno salvo com sucesso!";
            $_SESSION['message']['type'] = 1;
        }else{
            $_SESSION['message']['text'] = "Erro ao salvar aluno!";
            $_SESSION['message']['type'] = 0;
        }

        header("Location: index.php?c=student");

    }

    public function delete()
    {
        if(isset($_GET['id'])){
            if($this->model->delete($_GET['id'])){
                $_SESSION['message']['text'] = "Exclusão efetuada com sucesso!";
                $_SESSION['message']['type'] = 1;
            }else{
                $_SESSION['message']['text'] = "A exclusão falhou!";
                $_SESSION['message']['type'] = 0;
            }

            header("Location: index.php?c=student"); 
        }else{
            die("ID não informado!");
        } 
    }

    public function search()
    {
        $data[':NAME'] = "&".trim($_POST['name'])."%";
        $data[':COURSE'] = $_POST['course'];

        $result = $this->model->search($data);

        $courseModel = new course();
        $courses = $courseModel->findAll();

        include('Views/pageHeader.php');
        include('Views/StudentList.php');
        include('Views/pageFooter.php');
    }

}