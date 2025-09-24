<?php
require 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>To-Do List</title>
</head>
<body>
    <div class="container">
        <h1>To-Do <span class="highlight">List</span></h1>
        <form action="index.php" method="post">
            <input type="text" name="task" id="" placeholder="Enter new task: ">
            <button type="submit" name="addtask">ADD</button>
        </form>
    </div>
</body>
</html>