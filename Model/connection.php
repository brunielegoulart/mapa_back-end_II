<?php 

abstract class connection{

    protected function getConnection()
    {
        try{
            $conn = new PDO('mysql:host=localhost;dbname=mapa_backend_ii', 'root','');
            
            return $conn;
        }catch(PDOException $e){
            die($e->getMessage());

        }
    }
}