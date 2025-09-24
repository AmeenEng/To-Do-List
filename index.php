<?php
require 'db.php';

if(isset($_POST["addtask"]) && isset($_POST["task"])) {
    $task = $_POST["task"];
    $conn -> query("INSERT INTO tasks (task) VALUES ('$task')");
    header("Location: index.php");
    exit();
}

$result = $conn->query("SELECT * FROM tasks ORDER BY id");

if(isset($_GET["complete"])) {
    $id = $_GET["complete"];
    $conn->query("UPDATE tasks SET 	status = 1 WHERE id = $id");
    header("Location: index.php");
    exit();
}
if(isset($_GET["Delete"])) {
    $id = $_GET["Delete"];
    $conn->query("DELETE FROM tasks WHERE id = $id");
    header("Location: index.php");
    exit();
}
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
                <li class="<?php echo $row["status"] ? 'completed' : 'not-completed'; ?>">
                    <strong><?php echo htmlspecialchars($row["task"]);?></strong>
                    <div class="actions">
                        <a href="index.php?complete=<?php echo $row['id']; ?>">Complete</a>
                        <a href="index.php?Delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this task?')">Delete</a>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
</body>
</html>