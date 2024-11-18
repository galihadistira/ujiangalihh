<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tugasnya galih</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>To-Do List</h1>

    
    <form action="add_task.php" method="POST">
        <input type="text" name="task" placeholder="Tambah tugas baru..." required>
        <button type="submit" class="add-btn">Tambah</button>
    </form>

    
    <ul class="todo-list">
        <?php
        $result = $conn->query("SELECT * FROM todos ORDER BY created_at DESC");
        while ($row = $result->fetch_assoc()):
        ?>
            <li>
                <span class="<?= $row['status'] ? 'completed' : '' ?>">
                    <?= htmlspecialchars($row['task']) ?>
                </span>
                <div class="actions">
                    <form action="mark_complete.php" method="GET">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <button type="submit" class="complete-btn">Selesai</button>
                    </form>
                    <form action="delete_task.php" method="GET">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <button type="submit" class="delete-btn">Hapus</button>
                    </form>
                </div>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
