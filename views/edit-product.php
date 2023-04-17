<?php include 'html/head.html';
include '../classes/Product.php';
session_start();
$id = $_SESSION['id'];
$product = new Product;
$product_data = $product->getProduct($id);

// print_r($product_data);
?>

<?php include 'navbar.php' ?>

<body class="bg-light">
    <div class="" style="height:100vh">

        <div class="row h-100 m-0">

            <div class="card w-25 my-auto p-1 mx-auto">

                <div class="card-body">
                    <h3 class="text-center mb-2">Edit Product</h3>
                    <form action="../actions/edit-product.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Product Name</label>
                            <input type="text" name="product_name" id="product_name" class="form-control" value="<?= $product_data['product_name'] ?>" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" name="price" id="price" class="form-control" value="<?= $product_data['price'] ?>"  required >
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" value="<?= $product_data['quantity'] ?>"  required >
                        </div>


                        <div class="text-end">
                            <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-warning w-25">Edit</button>
                        </div>
                        <input type="hidden" name="id" value="<?= $product_data['id'] ?>">
                    </form>

                </div>
            </div>
        </div>
    </div>

</body>

<?php include 'html/foot.html' ?>