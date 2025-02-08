<?php
include 'connectvalues.php';

if (!isset($_GET['id'])) {
    die("ID not provided.");
}

$id = intval($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    
    $sql = "UPDATE todos SET title='$title', description='$description' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        $error = "Error: " . $conn->error;
    }
} else {
    $result = $conn->query("SELECT * FROM todos WHERE id=$id");
    if ($result->num_rows == 0) {
        die("Todo not found.");
    }
    $todo = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Todo</title>
</head>
<body>
    <h1>Edit Todo</h1>
    <?php if(isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
    <form method="post" action="">
        <p>
            <label>Title:</label><br>
            <input type="text" name="title" value="<?php echo htmlspecialchars($todo['title']); ?>" required>
        </p>
        <p>
            <label>Description:</label><br>
            <textarea name="description" rows="4" cols="50"><?php echo htmlspecialchars($todo['description']); ?></textarea>
        </p>
        <p>
            <input type="submit" value="Update Todo">
        </p>
    </form>
    <p><a href="index.php">Back to Todo List</a></p>
</body>
</html>
