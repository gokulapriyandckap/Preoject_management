<?php
//
//print_r($projects);
//?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src = "https://cdn.tailwindcss.com"></script>

</head>
<body>
<div class="mainContainer" style="display: flex; flex-direction: row-reverse; justify-content: space-evenly;">
<form action="../index.php" method="post">
    <div class="mb-6">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="color: black">Project Name</label>
        <input name="project_name" placeholder="Project Name" required id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  style="width: 50%;">
    </div>
    <input hidden name="action" required value="create">
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add new project</button>
</form>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                Project Name
            </th>
            <th scope="col" class="px-6 py-3">
                Tasks
            </th>
            <th>
                Action
            </th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($projects as $projects=>$value ): ?>
        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
            <input hidden value="<?php echo $value->id?>">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <?php echo $value->project_name; ?>
            </th>
            <td class="px-6 py-4">
            </td>
            <td class="px-6 py-4">
                <form action="../index.php" method="post">
                    <input name="projectId" value="<?php echo $value->id;?>">
                    <input name="action" value="projectId" hidden>
                    <button type="submit" value="<?php echo $value->id;?>">Add Task</button>
                </form>
            </td>
        </tr>
        </tbody>
        <?php endforeach; ?>
    </table>

</div>
</div>
</div>
</body>
</html>

