<?php

require  'connection.php';
// $conn['db'] = (new database())->db;
class UserModel extends database {
    public function fetch() {

//            $allData =  $this->db->prepare("SELECT projects.id, projects.project_name,tasks.task_name,tasks.task_description,tasks.task_image,tasks.project_id FROM projects JOIN tasks on projects.id = tasks.project_id");
           $allData = $this->db->prepare("SELECT * FROM projects");
            $allData->execute();
            $data = $allData->fetchAll(PDO::FETCH_OBJ);
            return $data;
    }
    public function create($data) {
           $allData = $this->db->prepare("INSERT INTO projects(project_name) VALUES('$data')");
            $allData->execute();
            header("location:/");
    }

    public function createTask($taskData,$image) {


        $taskName = $taskData['task_name'];
        $taskDescription = $taskData['task_description'];
        $projectId = $taskData['projectId'];

//         var_dump($image['name']);
        $task_image = $image['task_image']['name'];
//        var_dump($task_image);

        $insertData = $this->db->query("INSERT INTO tasks(task_name,task_description,task_image,project_id) VALUES('$taskName','$taskDescription','$task_image',$projectId)");
        var_dump($insertData);
    }

    public function update($id, $data) {
        // Perform database update operation based on $id and $data
    }

    public function delete($id) {
        // Perform database delete operation based on $id
    }


}