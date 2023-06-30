<html>
    <head>
        <title></title>
    </head>
    <body>
        <?php foreach ($task_details as $task_details):?>
        <h1><?php echo $task_details->task_name ?></h1>
        <img src="<?php echo $task_details->task_image ?>">
        <p><?php echo $task_details->task_description ?></p>
        <form action="/hideTask" method="post">
        <input value="<?php echo $task_details->id ?>" name="deleteId">
        <button>delete</button>
        <?php endforeach;?>
        </form>
    </body>
</html>
