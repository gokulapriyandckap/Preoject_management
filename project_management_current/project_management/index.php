<?php

error_reporting(E_ALL); ini_set('display_errors', 1);

require 'controller/userController.php';

$controller = new UserController();

if (isset($_POST['action'])) {
    $action = $_POST['action'];

    switch ($action) {
        case 'create':
            $controller->create($_POST);
            break;
        case 'createTask':
            $controller->createTask($_POST,$_FILES);
            break;
        case 'projectId':
//            print_r($_POST);
            $controller->projectTask($_POST);
            break;
        case 'delete':
            $controller->delete();
            break;
        case "view":

            $controller->index();
            break;
    }
} else {

    $controller->index();
    
}