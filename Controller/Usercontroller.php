<?php

require 'Modal/Usermodal.php';

class userController
{
    public $modal;

    public function __construct()
    {
        $this->modal = new userModal();
    }

    public function showHomePage(){
       $data = $this->modal->fetchProject();
        require 'View/homePage.php';
    }

    public function create($data){
        if($data){
            $this->modal->create($data);
        }
    }
    public function getProjectId($projectId){
//        var_dump($projectId);
        //geted projectid
        $project_Id = $projectId;

        $data = $this->modal->fetchProject();

        $fetchedValue = $this->modal->taskFetch($project_Id);

        $deleteTasks = $this->modal->undeletedTasks($project_Id);
//        var_dump($fetchedValue);
//        $id = $fetchedValue['id'];
//        var_dump($id);

//        $fetchedTasks = $this->modal->taskFetched();

//        $fetchedTasks = $this->modal->taskFetch();
//        echo $projectId;
//        header('location:/');

        require 'View/homePage.php';
        require 'View/taskDetails.php';
    }


    public function taskDetails($taskDetails,$img){
        var_dump($taskDetails);
        var_dump($img);

        $this->modal->taskDetails($taskDetails,$img);
        require 'View/addTask.php';
    }
    public function showAddTaskPage($addTaskId){
//        var_dump($addTaskId);
        $addTaskID = $addTaskId['addTaskId'];

        require 'View/addTask.php';
    }
    public function addTaskId(){
//        $addTaskID = $addTaskId['getTaskid'];
//        require 'View/addTask.php';

    }

    public function taskId(){

//        var_dump();
        $taskValue = $_POST['taskId'];
//
        $valuess = $this->modal->taskFetched($taskValue);

//        var_dump($taskid);
//        $taskIdValue = $taskId;
//        var_dump($taskIdValue);
    }
    public function showTaskPage($task_id){
      $task_details =  $this->modal->showTaks($task_id);
        require 'View/taskDetails.php';
    }

    public function hideTask($id){
//        var_dump($id);
        $deleteId = $id;
//        echo($deleteId);
        $this->modal->delete($deleteId);
//        require 'View/taskDetails.php';

    }
}