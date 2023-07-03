<?php
var_dump($taskImg);
?>

<html>
    <head>
        <title></title>
    </head>
    <body>
        <?php foreach ($task_details as $task_details):?>
        <h1><?php echo $task_details->task_name ?></h1>
        <p><?php echo $task_details->task_description ?></p>
        <?php foreach ($taskImg as $img=>$value):?>
            <img src="<?php echo $value->images ?>">
        <?php endforeach; ?>
        <form action="/hideTask" method="post">
        <input value="<?php echo $task_details->id ?>" name="deleteId">
        <button>delete</button>
        <?php endforeach;?>

        </form>


    </body>
</html>
