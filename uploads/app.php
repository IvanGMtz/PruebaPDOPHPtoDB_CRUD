<?php
    header("Access-Control-Allow-Origin: *");
    require "../vendor/autoload.php";
    $dotenv = Dotenv\Dotenv::createImmutable("../")->load();
    $router = new \Bramus\Router\Router();

    $router->mount('/pais', function() use($router){
        $router->post('/', '\App\crud@postAll');
        $router->put('/', '\App\crud@putAll');
        $router->get("/", '\App\crud@getAll');
        $router->delete('/', function() { 
            $cox = new \App\connect();
            $_DATA = json_decode(file_get_contents("php://input"));
            $res = $cox->con->prepare("DELETE FROM pais WHERE idPais=:id");
            $res->bindParam(':id', $_DATA->id);
            $res->execute();
            print_r($res->rowCount());
        });
    });

    $router->mount('/departamento', function() use($router){
        $router->post('/', '\App\crud2@postAll');
        $router->put('/', '\App\crud2@putAll');
        $router->get("/", '\App\crud2@getAll');
        $router->delete('/', function() { 
            $cox = new \App\connect();
            $_DATA = json_decode(file_get_contents("php://input"));
            $res = $cox->con->prepare("DELETE FROM departamento WHERE idDep=:id");
            $res->bindParam(':id', $_DATA->id);
            $res->execute();
            print_r($res->rowCount());
        });
    });

    $router->mount('/region', function() use($router){
        $router->post('/', '\App\crud3@postAll');
        $router->put('/', '\App\crud3@putAll');
        $router->get("/", '\App\crud3@getAll');
        $router->delete('/', function() { 
            $cox = new \App\connect();
            $_DATA = json_decode(file_get_contents("php://input"));
            $res = $cox->con->prepare("DELETE FROM region WHERE idReg=:id");
            $res->bindParam(':id', $_DATA->id);
            $res->execute();
            print_r($res->rowCount());
        });
    });

    $router->mount('/campers', function() use($router){
        $router->post('/', '\App\crud4@postAll');
        $router->put('/', '\App\crud4@putAll');
        $router->get("/", '\App\crud4@getAll');
        $router->delete('/', function() { 
            $cox = new \App\connect();
            $_DATA = json_decode(file_get_contents("php://input"));
            $res = $cox->con->prepare("DELETE FROM campers WHERE idCamper=:id");
            $res->bindParam(':id', $_DATA->id);
            $res->execute();
            print_r($res->rowCount());
        });
    });

    $router->run();
?>