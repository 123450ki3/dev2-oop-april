<?php include 'html/head.html' ?>

<body class="bg-light">
    <div class="" style="height:100vh">
        <div class="row h-100 m-0">
            <div class="card w-25 my-auto mx-auto">
                <div class="card-header bg-white border-0 py-3">
                    <h1 class="text-center">Add Product</h1>
                </div>
                <div class="card-body">
                    <form action="../actions/product.php" method="post">
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Product Name</label>
                            <input type="text" name="product_name" id="product_name" class="form-control" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" name="price" id="price" class="form-control" required >
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" required >
                        </div>

                        <button type="submit"  class="btn btn-success w-100">Add</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</body>



<?php include 'html/foot.html' ?>