<?php
    namespace App;
    class crud4 extends connect{
        public $_DATA;
        function __construct(){
            parent::__construct();
            $this->_DATA =(file_get_contents('php://input')=="") ? ["Mensaje"=>"Envien datos"] : json_decode(file_get_contents('php://input',true));
        }
        public function getAll(){
            $res = $this->con->prepare("SELECT * FROM campers");
            $res->execute();
            echo json_encode($res->fetchAll(\PDO::FETCH_ASSOC));
        }
        public function postAll(){
            $res =$this->con->prepare("INSERT INTO campers(nombreCamper, apellidoCamper, fechaNac,  idReg) VALUES(:nom,:apll, :fecha,  :idreg)");
            $res->bindParam(':nom', $this->_DATA->nom);
            $res->bindParam(':apll', $this->_DATA->apll);
            $res->bindParam(':fecha', $this->_DATA->fecha);
            $res->bindParam(':idreg', $this->_DATA->idreg);
            $res->execute();
            print_r($res->rowCount());
        }
        public function putAll(){
            $res = $this->con->prepare("UPDATE campers SET nombreCamper=:nom, apellidoCamper = :apll, fechaNac=:fecha,  idReg=:idreg WHERE idCamper = :id");
            $res->bindParam(':id', $this->_DATA->id);
            $res->bindParam(':nom', $this->_DATA->nom);
            $res->bindParam(':apll', $this->_DATA->apll);
            $res->bindParam(':fecha', $this->_DATA->fecha);
            $res->bindParam(':idreg', $this->_DATA->idreg);
            $res->execute();
            print_r($res->rowCount());
        }
    }
?>