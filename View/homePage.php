<?php
//var_dump($all);
//echo "<pre>";
//var_dump($undeleteTasks);
//echo "</pre>";
echo "<pre>";
//var_dump($undeletedCount);
//var_dump($deleteCount);
//var_dump($projectDetail);
//var_dump($productImg);
echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<div class="mainContainer" style="display: flex">
<form action="/create" method="post" enctype="multipart/form-data">
    Project Name
    <input name="projectName" type="text" required><br>
    <input type="file" name="projectImg[]" required multiple><br>
    <input type="submit">
</form>
<div class="secondContainer">
    <p>Projects</p>
<?php foreach ($data as $Project=> $values): ?>
<form action="/projectId" method="post">
    <input name="projectId" value="<?php echo $values->id ?>" hidden>
    <button value="<?php echo $values->id ?>"><?php echo $values->project_name ?></button>
</form>
<?php endforeach; ?>

    <?php foreach ($projectDetail as $projectName=>$val): ?>
        <p><?php echo $val ?></p>
    <?php endforeach; ?>

    <?php foreach ($productImg as $img): ?>
        <img src="<?php echo $img->images ?>" height="100px" width="100px">
    <?php endforeach; ?>
<!--    <img src="--><?php //echo $task_details->task_image ?><!--">-->


</div>

    <form action="/showAddTaskPage" method="post">
        <button value="<?php echo $project_Id ?>" name="addTaskId">Add Task</button>
    </form>

<div class="tasks">
        <ul>
            <h3>Tasks</h3>
            <?php foreach ($fetchedValue as $value): ?>
                <p><?php echo $value->task_name ?></p>
                <form action="/showTaskPage" method="post">
                    <input type="hidden" value="<?php echo $value->id ?>" hidden name="taskId">
                    <button type="submit" >View more</button>
                </form>
            <?php endforeach; ?>
        </ul>
</div>
    <div class="un deleted">
        <ul>
            <?php foreach ($undeletedCount as $count=>$value): ?>
            <h3>un deleted (<?php echo $value ?>)</h3>
            <?php endforeach; ?>
            <?php foreach ($fetchedValue as $value): ?>
                <p><?php echo $value->task_name ?></p>
                <form action="/showTaskPage" method="post">
                    <input type="hidden" value="<?php echo $value->id ?>" hidden name="taskId">
                    <button type="submit" >View more</button>
                </form>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="deleted">
        <ul>
            //this is one of the way to count the values
<!--            <h1>--><?php //echo $deleteCount ?><!--</h1>-->
            <?php foreach ($deleteCount as $cout=>$val): ?>
            <h3>Deleted tasks (<?php echo $val ?>)</h3>
            <?php endforeach; ?>
            <?php foreach ($deleteTasks as $value): ?>
                <p><?php echo $value->task_name ?></p>
                <form action="/showTaskPage" method="post">
                    <input type="hidden" value="<?php echo $value->id ?>" hidden name="taskId">
                    <button type="submit" >View more</button>
                </form>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
</body>
</html>


