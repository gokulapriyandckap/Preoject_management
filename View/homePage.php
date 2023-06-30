<?php
//var_dump($all);
//echo "<pre>";
//var_dump($undeleteTasks);
//echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<!--    <script src = "https://cdn.tailwindcss.com"></script>-->

</head>

<!--<h1>hello</h1>-->
<div class="mainContainer" style="display: flex">
<form action="/create" method="post">
    Project Name
    <input name="projectName" type="text" required>
    <input type="submit">
</form>
<div class="secondContainer">
<?php foreach ($data as $Project=> $values): ?>
<form action="/projectId" method="post">
    <input name="projectId" value="<?php echo $values->id ?>">
    <button value="<?php echo $values->id ?>"><?php echo $values->project_name ?></button>
</form>
<?php endforeach; ?>

    <form action="/showAddTaskPage" method="post">
        <button value="<?php echo $project_Id ?>" name="addTaskId">Add Task</button>
    </form>
</div>
<div class="tasks">

        <ul>
            <h3>Tasks</h3>
            <?php foreach ($fetchedValue as $value): ?>
<!--            <form  action="/taskId" method="post">-->
                <p><?php echo $value->task_name ?></p>
<!--                <input value="--><?php //echo $value->id ?><!--" name="taskId">-->
                <form action="/showTaskPage" method="post">
                    <input type="hidden" value="<?php echo $value->id ?>" name="taskId">
                    <button type="submit" >View more</button>
                </form>
<!--            </form>-->
            <?php endforeach; ?>
        </ul>

</div>
    <div class="DELETED">

        <ul>
            <h3>un deleted</h3>
            <?php foreach ($fetchedValue as $value): ?>
                <!--            <form  action="/taskId" method="post">-->
                <p><?php echo $value->task_name ?></p>
                <!--                <input value="--><?php //echo $value->id ?><!--" name="taskId">-->
                <form action="/showTaskPage" method="post">
                    <input type="hidden" value="<?php echo $value->id ?>" name="taskId">
                    <button type="submit" >View more</button>
                </form>
                <!--            </form>-->
            <?php endforeach; ?>
        </ul>

    </div>

    <div class="undeleted">
        <ul>
            <h3>Deleted tasks</h3>
            <?php foreach ($deleteTasks as $value): ?>
                <!--            <form  action="/taskId" method="post">-->
                <p><?php echo $value->task_name ?></p>
                <!--                <input value="--><?php //echo $value->id ?><!--" name="taskId">-->
                <form action="/showTaskPage" method="post">
                    <input type="hidden" value="<?php echo $value->id ?>" name="taskId">
                    <button type="submit" >View more</button>
                </form>
                <!--            </form>-->
            <?php endforeach; ?>
        </ul>
    </div>
</div>
</body>
</html>


