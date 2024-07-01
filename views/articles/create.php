<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Article</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h2>Create Article</h2>
    <form action="index.php?controller=article&action=create" method="post">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>
        <br>
        <label for="content">Content:</label>
        <textarea name="content" id="content" required></textarea>
        <br>
        <label for="image_url">Image URL:</label>
        <input type="text" name="image_url" id="image_url">
        <br>
        <label for="category_id">Category:</label>
        <select name="category_id" id="category_id">
         
        </select>
        <br>
        <input type="submit" value="Create">
    </form>
</body>
</html>
