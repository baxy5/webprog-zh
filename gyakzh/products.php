<?php
require_once ('config.inc.php');

if (isset($_POST['name']) && isset($_POST['desc']) && isset($_POST['price'])) {
    $conn = get_connection();

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $sql = "INSERT INTO products (name, price, description) VALUES ('{$_POST['name']}', '{$_POST['price']}', '{$_POST['desc']}')";

    $res = $conn->query($sql);

    $conn = null;

    header("Location: {$_SERVER['REQUEST_URI']}");
    exit();
}

$products = [];
$conn = get_connection();

$sql = "SELECT * from products";

$res = $conn->query($sql);

$products = $res->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <?php include ("components/header.php"); ?>

    <div class="container">
        <h1>Termék hozzáadása</h1>
        <form action="" method="POST">
            <div class="form-floating mb-3">
                <input type="text" name="name" class="form-control" id="floatingInput" placeholder="termék neve">
                <label for="floatingInput">Termék neve</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="desc" class="form-control" id="floatingInput" placeholder="termék leírása">
                <label for="floatingInput">Termék leírása</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" name="price" class="form-control" id="floatingInput" placeholder="termék ára">
                <label for="floatingInput">Termék ára</label>
            </div>
            <button type="submit" class="btn btn-primary">Hozzáadás</button>
        </form>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Termékek:</h1>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($products as $key => $product) {
                            echo '<tr>';
                            echo '<td>' . $product['id'] . '</td>';
                            echo '<td>' . $product['name'] . '</td>';
                            echo '<td>' . $product['price'] . '</td>';
                            echo '<td>' . $product['description'] . '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>