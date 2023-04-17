<?php 
include 'Database.php';

class Product extends Database {

public function store($request){
    $productname = $request['product_name'];
    $price = $request['price'];
    $quantity = $request['quantity'];

    $sql  = "INSERT INTO products (product_name, price, quantity)VALUES('$productname','$price','$quantity')";

    if($this->conn->query($sql)){
        header('location:../views');
    }else{
        die('Error add product '. $this->conn->error );
    }
}

public function getAllProduct(){
    $sql = "SELECT * FROM products";
    if($result = $this->conn->query($sql)){
        return $result;
    }else{
        die('Error retreiving the data '. $this->conn->error );
    }
}

public function productupdate($request, $files){
    $productname = $request['product_name'];
    $price = $request['price'];
    $quantity = $request['quantity'];
    $product_id = $request['id'];

    $sql = "UPDATE products SET product_name = ?, price = ?, quantity = ? WHERE id = ?";

    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param('siii', $productname, $price, $quantity, $product_id);

    if($stmt->execute()){
        header('Location: ../views/dashboard.php');
    } else {
        die('Error: updating product '.$this->conn->error);
    }
}

public function getProduct($id){
    $sql = "SELECT * FROM products WHERE id = '$id'";

    if($result = $this->conn->query($sql)){
        return $result->fetch_assoc();
    }else{
        die('Error: '. $this->conn->error);
    }   

}

public function deleteproduct(){
    session_start();
    $id = $_SESSION['id'];
    $sql = "DELETE FROM products WHERE id = '$id'";

    if($this->conn->query($sql)){
        header('location: dashboard.php');
    }else{
        die("Error deleting user ");
    }
}


}

