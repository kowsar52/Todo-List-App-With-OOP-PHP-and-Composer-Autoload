<?php 
namespace App;
use App\Controllers\TodoController;

class Router{
    //post method

    public function __construct(){
        $request_uri = $_SERVER['REQUEST_URI'];
        
        $request= ltrim($request_uri, 'TODO-OOP/');//new uri
        
        switch ($request) {
            case '/' :
                require 'Views/index.php' ;
                break;
            case '' :
                require 'Views/index.php' ;
                break;
            case 'getData' :
                TodoController::getData($_POST);
                break;
            case 'store' :
                TodoController::store($_POST);
                break;
            case 'update' :
                TodoController::update($_POST);
                break;
            case 'edit' :
                TodoController::edit($_POST);
                break;
            case 'clear' :
                TodoController::clear($_POST);
                break;
            default:
                http_response_code(404);
                require 'Views/404.php' ;
                break;
            }
    }
}