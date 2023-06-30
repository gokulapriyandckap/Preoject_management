<?php

//echo 'hi';
//require 'connection.php';
//
//$newValue = (new DatabaseConnection())->db;
////$newValue->db;
//echo $newValue;

require 'router.php';

$router = new Router();

$router->get('/','viewHomePage');
$router->post('/create','insertProject');
$router->post('/fetchProject','fetchProject');
$router->post('/projectId','getProjectId');
$router->post('/taskDetails','taskDetails');
$router->post('/showAddTaskPage','showAddTaskPage');
$router->post('/addTaskId','addTaskId');
$router->post('/taskId','taskId');
$router->post('/showDetails','showDetails');
$router->post('/showTaskPage','showTaskPage');
$router->post('/hideTask','hideTask');
$router->routerConnection($_SERVER['REQUEST_URI'],$_SERVER['REQUEST_METHOD']);