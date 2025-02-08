<?php
include 'connectvalues.php';

// Retrieve all todo items from the database
$result = $conn->query("SELECT * FROM todos ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Todo List</title>
    <style>
        /* Basic styling for the table */
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid #ccc; padding: 8px; }
        th { background-color: #f2f2f2; }
        a { text-decoration: none; color: #007BFF; }
    </style>
</head>
<body>
    <h1>Todo List</h1>
    <p><a href="create.php">Add New Todo</a></p>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo htmlspecialchars($row['title']); ?></td>
            <td><?php echo htmlspecialchars($row['description']); ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
                <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this todo?');">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
