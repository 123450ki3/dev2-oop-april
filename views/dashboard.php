<?php include 'html/head.html';
include '../classes/Product.php';
session_start();
$product = new Product;
$all_products = $product->getAllProduct();
?>

<?php include 'navbar.php';  ?>

<main class="row justify-content-center">
    <div class="col-10">
        <div class="row">
            <div class="col-11">
                <h2 class="text-left fw-bold">
                    Product List
                </h2>
            </div>
            <div class="col-1">
                <a href="product.php">
                    <button type="submit" class="btn text-info btn-lg text-end">
                        <i class="fa-solid fa-plus fa-2x"></i>
                    </button>
                </a>
            </div>

        </div>

        
        <table class="table table-hover align-middle mt-3" border="1">
            <thead class="bg-dark text-light">
                <th>ID</th>
                <th>Product NAME</th>
                <th>Price</th>
                <th>Quantity</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                <?php foreach ($all_products as $product) : ?>
                    <tr>
                        <td><?= $product['id']  ?></td>
                        <td><?= $product['product_name']  ?></td>
                        <td><?= $product['price']  ?></td>
                        <td><?= $product['quantity']  ?></td>
                        <td>
                            <?php if($product['id'] == $_SESSION['id'] ): ?>
                                <a href="edit-product.php" class="btn btn-warning">
                                    <i class="fa-solid fa-pen"></i>
                                </a>

                                <form action="delete-product.php" method="post" class="d-inline ms-1">
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($product['id'] == $_SESSION['id'] ): ?>
                                <a href="buy-product.php" class="btn btn-success">
                                    <i class="fa-solid fa-cash-register"></i>
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</main>




<?php include 'html/foot.html'; ?>