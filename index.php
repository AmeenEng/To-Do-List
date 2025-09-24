<?php
require 'db.php';

if(isset($_POST["addtask"]) && isset($_POST["task"])) {
    $task = $_POST["task"];
    $conn -> query("INSERT INTO tasks (task) VALUES ('$task')");
    header("Location: index.php");
    exit();
}

$result = $conn->query("SELECT * FROM tasks ORDER BY id DESC");
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
        <ul>
            <?php while($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                <li>
                    <?php echo htmlspecialchars($row["task"]);?>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
</body>
</html>