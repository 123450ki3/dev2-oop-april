<?php 
include 'Database.php';


class User extends Database {

    public function store($request){
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
        $username = $request['username'];
        $password = $request['password'];

        $password = password_hash($password,PASSWORD_DEFAULT);

        $sql  = "INSERT INTO users (first_name,last_name,username,password)VALUES('$firstname','$lastname','$username','$password')";

        if($this->conn->query($sql)){
            header('location:../views');
        }else{
            die('Error creating user '. $this->conn->error );
        }
    }

    public function login($request){
        $username = $request['username'];
        $password = $request['password'];

        $sql = "SELECT * FROM users WHERE username = '$username'";

         $result = $this->conn->query($sql);

        if($result->num_rows == 1){
            $user = $result->fetch_assoc();

                if(password_verify($password,$user['password'])){
                    session_start();
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['fullname'] = $user['first_name']." ".$user['last_name'];

                    header('location: ../views/dashboard.php');
                    exit;

                }else{
                    die('ERROR: password dont match');
                }
        }else{
            die('ERROR: username not found');
        }

    }
    public function logout(){
        session_start();
        session_unset();
        session_destroy();

        header('location: ../views/login.php');
        exit;
    }

    public function getAllUser(){
        $sql = "SELECT * FROM users";
        if($result = $this->conn->query($sql)){
            return $result;
        }else{
            die('Error retreiving the data '. $this->conn->error );
        }
    }

    public function getUser($id){
        $sql = "SELECT * FROM users WHERE id = '$id'";

        if($result = $this->conn->query($sql)){
            return $result->fetch_assoc();
        }else{
            die('Error: '. $this->conn->error);
        }   

    }
    public function update($request,$files){
        session_start();
        $id = $_SESSION['id'];
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
        $username = $request['username'];
        $photo = $files['photo']['name'];
        $tmp_photo = $files['photo']['tmp_name'];

        $sql =  "UPDATE users SET first_name = '$firstname', last_name = '$lastname', username = '$username' WHERE id  = '$id'";

        if($this->conn->query($sql)){
            $_SESSION['username'] = $username;
            $_SESSION['full_name'] = $firstname." ".$lastname;
            
            if($photo){
                $sql = "UPDATE users SET photo = '$photo' WHERE id = $id";
                $destination = "../assets/images/$photo";

                if($this->conn->query($sql)){
                    if(move_uploaded_file($tmp_photo,$destination)){
                        header('location: ../views/dashboard.php');
                        exit;
                    }else{
                        die('Error: moving photo');
                    }
                }else{
                    die('ERROR: uploading photo '.$this->conn->error);
                }
            }


        }else{
            die('Error: updating user '.$this->conn->error);
        }

    }
    public function delete(){
        session_start();
        $id = $_SESSION['id'];
        $sql = "DELETE FROM users WHERE id = '$id'";
    
        if($this->conn->query($sql)){
            header('location: logout.php');
        }else{
            die("Error deleting user ");
        }
    }

}

