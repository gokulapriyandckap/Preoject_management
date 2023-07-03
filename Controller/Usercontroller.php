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

    public function create($data,$img){
        if($data){
            $this->modal->create($data,$img);
        }
    }
    public function getProjectId($projectId){
//        var_dump($projectId);
        //geted projecId
        $project_Id = $projectId;
        //this function for fetching the project details from the database
        $data = $this->modal->fetchProject();
        //this function fetches the task details from the backend and show it to the frontend
        $fetchedValue = $this->modal->taskFetch($project_Id);
        //this shows the unDeletedTasks details from the backend
        $deleteTasks = $this->modal->undeletedTasks($project_Id);
        //this shows the deleteCount from the database
        $deleteCount = $this->modal->deleteCount($project_Id);
        //it shows the undeleted count from the backend
        $undeletedCount = $this->modal->undeletedCount($project_Id);
        //for showing projectDetails
        $projectDetail = $this->modal->projectDetail($project_Id);

        $productImg = $this->modal->productImg($project_Id);


        require 'View/homePage.php';
        require 'View/taskDetails.php';
    }

    public function taskDetails($taskDetails,$img){
        $this->modal->taskDetails($taskDetails,$img);
        require 'View/addTask.php';
    }
    public function showAddTaskPage($addTaskId){
        $addTaskID = $addTaskId['addTaskId'];
        require 'View/addTask.php';
    }
    public function taskId(){
        $taskValue = $_POST['taskId'];
        $valuess = $this->modal->taskFetched($taskValue);

    }
    public function showTaskPage($task_id){
      $task_details =  $this->modal->showTaks($task_id);
        $taskImg = $this->modal->taskImgs($task_id);

        require 'View/taskDetails.php';
    }

    public function hideTask($id){
        $deleteId = $id;
        $this->modal->delete($deleteId);
    }
}