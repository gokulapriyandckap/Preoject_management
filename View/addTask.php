<?php
//var_dump($taskid);
//var_dump($valuess);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="mainContainer">
    <form method="post" action="/taskDetails" enctype="multipart/form-data">
    Task Name : <input type="text" required name="taskName">
    Task Description : <input type="text" required name="taskDescription">
    Task Image : <input type="file" required name="taskImage[]" multiple>
    <button type="submit" name="getTaskid" value="<?php echo $addTaskID ?>">Submit</button>
    </form>
</div>
</body>
</html>

