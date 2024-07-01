<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Articles</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h2>Articles</h2>
    <a href="index.php?controller=article&action=create">Create New Article</a>
    <ul>
        <?php
        while ($row = $articles->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            echo "<li><a href='index.php?controller=article&action=show&id={$id}'>{$titre}</a></li>";
        }
        ?>
    </ul>
</body>
</html>
