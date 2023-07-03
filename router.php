<?php

require 'Controller/Usercontroller.php';

class Router
{
    public $controller;

    public $routerDetails =  [];

    public function __construct()
    {
        $this->controller = new userController();
    }
    public function get($uri,$action)
    {
        $this->routerDetails[] = [
            'uri' => $uri,
            'action' => $action,
            'method' =>"GET"
        ];
    }

    public function post($uri,$action)
    {
        $this->routerDetails[] = [
            'uri' => $uri,
            'action' => $action,
            'method' =>"POST"
        ];
    }

    public function routerConnection($serverUri,$serverMethod){
    foreach ($this->routerDetails as $routerValue){
        if($routerValue['uri'] == $serverUri && $routerValue['method'] == $serverMethod){
            $action = $routerValue['action'];
//            var_dump($action);
            switch ($action)
            {
                case 'viewHomePage':
                    $this->controller->showHomePage();
                case "insertProject":
                    $this->controller->create($_POST,$_FILES);
                    break;
                case "fetchProject":
                    $this->controller->fetchProject();
                    break;
                case "delete":
                    $this->controller->delete();
                    break;
                case "getProjectId":
                    $this->controller->getProjectId($_POST['projectId']);
                    break;
                case "taskDetails":
                    $this->controller->taskDetails($_POST,$_FILES);
                    break;
                case "showAddTaskPage":
                    $this->controller->showAddTaskPage($_POST);
                    break;
                case "addTaskId":
                    $this->controller->addTaskId($_POST['addTaskId']);
                    break;
                case "taskId":
                    $this->controller->taskId($_POST['taskId']);
                    break;
                case "showTaskPage":
                    $this->controller->showTaskPage($_POST["taskId"]);
                    break;
                case "hideTask":
                    $this->controller->hideTask($_POST['deleteId']);
                    break;
            }
        }
    }
    }
}