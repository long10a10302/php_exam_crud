<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once('db_connection.php');
    $pdo = getPDO();
    $sql = "SELECT * FROM books";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <a href="create_book.php">Insert</a>
    <table>
        <thead>
            <th>Title</th>
            <th>Author</th>
            <th>Price</th>
            <th>Action</th>
        </thead>
        <?php
        
        foreach ($result as $book) { ?>
            <tr>
                <td><?=$book['title']?></td>
                <td><?=$book['author']?></td>
                <td><?=$book['price']?></td>
                <td>
                    <a href="update_book.php?id=<?=$book['book_id']?>">Update</a>
                    <a href="delete_book.php?id=<?=$book['book_id']?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>