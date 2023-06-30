<?php

require 'connection.php';

class userModal extends DatabaseConnection
{
    public function create($projectName){
        $projectName =  $projectName['projectName'];
//        var_dump($projectName);
        $inserProjectName = $this->db->prepare("INSERT INTO projects(project_name)VALUES('$projectName')");
        $inserProjectName->execute();

        header('location:/');

    }

    public function fetchProject(){
        $fetch = $this->db->query("SELECT * FROM projects");
        $fetched = $fetch->fetchAll(PDO::FETCH_OBJ);
        return $fetched;
    }

    public function taskFetch($projectId){
////    var_dump($projectId);
//         $askIdFetched = $taskId;
//    $fetchedProjectId = $projectId;
//    echo $fetchedProjectId;
////        SELECT * FROM `tasks` where project_id = 4;

        $fetchTask = $this->db->query("SELECT *  FROM tasks WHERE project_id ='$projectId' and is_deleted is null");

        return $fetchTask->fetchAll(PDO::FETCH_OBJ);
        header('location:/');
    }

    public function undeletedTasks($projectId){
//        $fetchedProjectId = $projectId;

        $unDeletedTasks = $this->db->query("SELECT *  FROM tasks WHERE project_id = $projectId and is_deleted is not null");
        return $unDeletedTasks->fetchAll(PDO::FETCH_OBJ);
        header('location:/');
    }

    public function taskFetched($taskId){
        $askIdFetched = $taskId;
        var_dump($askIdFetched);
        //SELECT * FROM tasks WHERE id = 5 and is_deleted is NULL;
//        $fetchTasks = $this->db->query("SELECT *  FROM tasks WHERE id ='$askIdFetched' and is_deleted is NULL");
        $fetchTasks = $this->db->query("SELECT *  FROM tasks WHERE id = $askIdFetched and is_deleted is null");
//        var_dump($fetchTasks);
//        $all =  $fetchTasks->fetchAll();
//        return $all;
//        header('location:/');
//        var_dump($all);

    }

    public function taskDetails($taskDetails,$img){
//        var_dump($taskDetails);
//        echo "<pre>";
//        var_dump($img);
//        echo "</pre>";
        $taskName = $taskDetails['taskName'];
        $taskDescription = $taskDetails['taskDescription'];
        $taskImage = $img['taskImage']['name'];
        $imgPath = "images/".$taskImage;
//        $taskImg = $img['taskImage']['tmp_name'];
        move_uploaded_file($img['taskImage']['tmp_name'],$imgPath);
        echo "<pre>";
//        var_dump($taskImg);
        echo "</pre>";
        $taskId = $taskDetails['getTaskid'];

//        var_dump($taskName,$taskImage,$taskDescription,$taskId);
        $insertTask = $this->db->prepare("INSERT INTO tasks(task_name,task_description,task_image,project_id)VALUES('$taskName','$taskDescription','$imgPath','$taskId')");
        $insertTask->execute();

        header('location:/');
    }

    public function delete($deleteId){
        $hideIt = $deleteId;
//        var_dump($hideIt);
        $updateDelete = $this->db->query("UPDATE tasks SET is_deleted = now() WHERE id=$hideIt");
        header('location:/');

    }
    public function showTaks($task_id){
        $task_details = $this->db->query("SELECT * FROM tasks WHERE id = '$task_id' ");
        $task_details = $task_details->fetchAll(PDO::FETCH_OBJ);
        return $task_details;

    }


}

