<?php
require 'model/usermodel.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }
    public function index() {
        $projects = $this->userModel->fetch();
        require 'view/home.php';
    }

    public function create($data) {
        unset($data["action"]);
        $this->userModel->create($data["project_name"]);
    }

    public function createTask($Tasks,$files) {
   $this->userModel->createTask($Tasks,$files);

    }
    public function projectTask($projectId){
        $projectid = $projectId['projectId'];
        require 'view/addTask.php';
    }



    public function delete($id) {
        // Handle user deletion
    }



    public function view() {
        echo "log";
        // Retrieve a specific user from the UserModel and load the view view
    }
}