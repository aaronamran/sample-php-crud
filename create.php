<?php
include 'connectvalues.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    
    $sql = "INSERT INTO todos (title, description) VALUES ('$title', '$description')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Todo</title>
</head>
<body>
    <h1>Add New Todo</h1>
    <?php if(isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
    <form method="post" action="">
        <p>
            <label>Title:</label><br>
            <input type="text" name="title" required>
        </p>
        <p>
            <label>Description:</label><br>
            <textarea name="description" rows="4" cols="50"></textarea>
        </p>
        <p>
            <input type="submit" value="Add Todo">
        </p>
    </form>
    <p><a href="index.php">Back to Todo List</a></p>
</body>
</html>
