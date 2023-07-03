<?php

require 'connection.php';

class userModal extends DatabaseConnection
{
    public function create($data,$img){
        $projectName = $data['projectName'];
        $inserProjectName = $this->db->prepare("INSERT INTO projects(project_name)VALUES('$projectName')");
        $inserProjectName->execute();

        $inn = $this->db->query("SELECT id FROM projects ORDER BY id DESC LIMIT 1;");
        $id = $inn->fetch();
        foreach ($_FILES['projectImg']['tmp_name'] as $key =>$value){
            $idValue = $id['id'];
            echo "<pre>";
            var_dump($idValue);
            echo "</pre>";
            $file_tmpname = $_FILES['projectImg']['tmp_name'][$key];
            $file_name = $_FILES['projectImg']['name'][$key];
            $imgPath = "images/".$file_name;
            move_uploaded_file($file_tmpname,$imgPath);
            $insertImg = $this->db->prepare("INSERT INTO images(images,model_type,model_id)VALUES ('$imgPath','project','$idValue')");
            $insertImg->execute();
        }
        header('location:/');
    }

    public function fetchProject(){
        $fetch = $this->db->query("SELECT * FROM projects");
        $fetched = $fetch->fetchAll(PDO::FETCH_OBJ);
        return $fetched;
    }

    public function taskFetch($projectId){
        $fetchTask = $this->db->query("SELECT *  FROM tasks WHERE project_id ='$projectId' and deleted_at is null");
        return $fetchTask->fetchAll(PDO::FETCH_OBJ);
        header('location:/');
    }

    public function undeletedTasks($projectId){
        $unDeletedTasks = $this->db->query("SELECT *  FROM tasks WHERE project_id = $projectId and deleted_at is not null");
        return $unDeletedTasks->fetchAll(PDO::FETCH_OBJ);
        header('location:/');
    }

    public function deleteCount($projectId){
       $undeleteCount = $this->db->query("SELECT count(project_id)  FROM tasks WHERE project_id = $projectId and deleted_at is not null;");
        return $undeleteCount->fetch(PDO::FETCH_OBJ);

        //other way to get count
//        $undeleteCount = $this->db->query("SELECT * FROM tasks WHERE project_id = '$projectId' and is_deleted is not null");
//        $new = $undeleteCount->fetchAll();
//        $counts = count($new);
//        return $counts;
//        var_dump($counts);
    }
    public function undeletedCount($projectId){
        $deleteCount = $this->db->query("SELECT count(project_id)  FROM tasks WHERE project_id = '$projectId' and deleted_at is null");
        return $deleteCount->fetch(PDO::FETCH_OBJ);
    }

    public function projectDetail($projectId){
        $projectDetail = $this->db->query("SELECT project_name from projects WHERE id='$projectId'");
        return $projectDetail->fetch(PDO::FETCH_OBJ);
    }

    public function productImg($projectId){
        $projectImg = $this->db->query("SELECT images from images WHERE model_type = 'project' and model_id = $projectId");
        return $projectImg->fetchAll(PDO::FETCH_OBJ);
    }

    public function taskImgs($taskId){
        $taskImg = $this->db->query("SELECT images from images WHERE model_type = 'task'");
        return $taskImg->fetchAll(PDO::FETCH_OBJ);
//        var_dump($n);
    }



    public function taskDetails($taskDetails,$img){
        $taskId = $taskDetails['getTaskid'];
        $taskName = $taskDetails['taskName'];
        $taskDescription = $taskDetails['taskDescription'];

        foreach ($_FILES['taskImage']['tmp_name'] as $key =>$value){
            $file_tmpname = $_FILES['taskImage']['tmp_name'][$key];
           $file_name = $_FILES['taskImage']['name'][$key];
            $imgPath = "images/".$file_name;
            move_uploaded_file($file_tmpname,$imgPath);
            $insertImg = $this->db->prepare("INSERT INTO images(images,model_type,model_id)VALUES ('$imgPath','task','$taskId')");
            $insertImg->execute();
            header('location:/');
        }
//for single img upload
//        $taskImage = $img['taskImage']['name'];
//        $imgPath = "images/".$taskImage;
////        $taskImg = $img['taskImage']['tmp_name'];
//        move_uploaded_file($img['taskImage']['tmp_name'],$imgPath);
//        echo "<pre>";
////        var_dump($taskImg);
//        echo "</pre>";
        $insertTask = $this->db->prepare("INSERT INTO tasks(task_name,task_description,project_id)VALUES('$taskName','$taskDescription','$taskId')");
        $insertTask->execute();
        header('location:/');
    }

    public function delete($deleteId){
        $hideIt = $deleteId;
        $updateDelete = $this->db->query("UPDATE tasks SET deleted_at = now() WHERE id=$hideIt");
        header('location:/');
    }
    public function showTaks($task_id){
        $task_details = $this->db->query("SELECT * FROM tasks WHERE id = '$task_id' ");
        $task_details = $task_details->fetchAll(PDO::FETCH_OBJ);
        return $task_details;
    }
}

