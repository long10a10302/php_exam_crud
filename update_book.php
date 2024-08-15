<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Edit</title>
</head>

<body>
    <?php
    require_once 'db_connection.php';
    $pdo = getPDO();


    $bookId = isset($_GET['id']) ? $_GET['id'] : '';


    $sql = "SELECT * FROM books WHERE book_id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $bookId, PDO::PARAM_INT);
    $stmt->execute();
    $book = $stmt->fetch(PDO::FETCH_ASSOC);


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $price = $_POST['price'];


        $updateSql = "UPDATE books SET title = :title, author = :author, price = :price WHERE book_id = :id";
        $updateStmt = $pdo->prepare($updateSql);
        $updateStmt->bindParam(":title", $title, PDO::PARAM_STR);
        $updateStmt->bindParam(":author", $author, PDO::PARAM_STR);
        $updateStmt->bindParam(":price", $price, PDO::PARAM_STR);
        $updateStmt->bindParam(":id", $bookId, PDO::PARAM_INT);
        $updateStmt->execute();

        header("Location: list_book.php");
        exit;
    }
    ?>

    <form action="" method="post">
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="<?= $book['title'] ?>">
        </div>
        <div>
            <label for="author">Author</label>
            <input type="text" name="author" id="author" value="<?= $book['author'] ?>">
        </div>
        <div>
            <label for="price">Price</label>
            <input type="text" name="price" id="price" value="<?= $book['price'] ?>">
        </div>
        <input type="submit" value="Update Book">
    </form>
</body>

</html>