<?php
    namespace App;
    class crud3 extends connect{
        public $_DATA;
        function __construct(){
            parent::__construct();
            $this->_DATA =(file_get_contents('php://input')=="") ? ["Mensaje"=>"Envien datos"] : json_decode(file_get_contents('php://input',true));
        }
        public function getAll(){
            $res = $this->con->prepare("SELECT * FROM region");
            $res->execute();
            echo json_encode($res->fetchAll(\PDO::FETCH_ASSOC));
        }
        public function postAll(){
            $res =$this->con->prepare("INSERT INTO region(nombreReg, idDep) VALUES(:nom, :iddep)");
            $res->bindParam(':nom', $this->_DATA->nom);
            $res->bindParam(':iddep', $this->_DATA->iddep);
            $res->execute();
            print_r($res->rowCount());
        }
        public function putAll(){
            $res = $this->con->prepare("UPDATE region SET nombreReg = :nom, idDep=:iddep WHERE idReg = :id");
            $res->bindParam(':id', $this->_DATA->id);
            $res->bindParam(':nom', $this->_DATA->nom);
            $res->bindParam(':iddep', $this->_DATA->iddep);
            $res->execute();
            print_r($res->rowCount());
        }
    }
?>