<?php
    namespace App;
    class crud extends connect{
        public $_DATA;
        function __construct(){
            parent::__construct();
            $this->_DATA =(file_get_contents('php://input')=="") ? ["Mensaje"=>"Envien datos"] : json_decode(file_get_contents('php://input',true));
        }
        public function getAll(){
            $res = $this->con->prepare("SELECT * FROM pais");
            $res->execute();
            echo json_encode($res->fetchAll(\PDO::FETCH_ASSOC));
        }
        public function postAll(){
            $res =$this->con->prepare("INSERT INTO pais(nombrePais) VALUES(:nom)");
            $res->bindParam(':nom', $this->_DATA->nom);
            $res->execute();
            print_r($res->rowCount());
        }
        public function putAll(){
            $res = $this->con->prepare("UPDATE pais SET nombrePais = :nom WHERE id = :id");
            $res->bindParam(':id', $this->_DATA->id);
            $res->bindParam(':nom', $this->_DATA->nom);
            $res->execute();
            print_r($res->rowCount());
        }
    }
?>