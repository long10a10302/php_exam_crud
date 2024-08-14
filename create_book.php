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
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $price = $_POST['price'];

        $sql = "INSERT INTO books (title, author, price) VALUES (:title, :author, :price)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":title", $title, PDO::PARAM_STR);
        $stmt->bindParam(":author", $author, PDO::PARAM_STR);
        $stmt->bindParam(":price", $price, PDO::PARAM_INT);
        if ($stmt->execute()) {
            header("Location: list_book.php");
            exit;
        } else {
            echo "Tạo sách thất bại";
        }
    }
    ?>
    <form action="" method="post">
        <div>
            <label for="">Title</label>
            <input type="text" name="title" id="">
        </div>
        <div>
            <label for="">Author</label>
            <input type="text" name="author" id="">
        </div>
        <div>
            <label for="">Price</label>
            <input type="text" name="price" id="">
        </div>
        <input type="submit" value="Create Book">

    </form>
</body>

</html>