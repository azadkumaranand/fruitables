<?php 

include "header.php";
require './db/connect.php';


$error_message = '';
$successMessage = '';

if($_SERVER['REQUEST_METHOD']=="POST"){
    
    $fullname = $_POST['full_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $userType = $_POST['user_type'];
    echo "<pre>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    // print_r($_POST);
    echo "</pre>";
    // exit();
    if($password != $confirm){
        $error_message = "Password not matched";
        exit();
    }

    $sql = "INSERT INTO users (fullname, phone, email, password, role) VALUES ('$fullname', '$phone', '$email', '$password', '$userType')";
    $result = $conn->query($sql);
    if($result){
        $successMessage = "User Created Successfully!";
    }
}

?>

<div class="container-fluid my-5 py-5">
    <div class="container py-5">
        <form action="" method="post">
            <div class="form-group">
                <?php //echo $_SERVER['REQUEST_METHOD']; ?>
                <?php 
                    if(!empty($error_message)){
                        echo "<p class='alert alert-danger'>$error_message</p>";
                    }
                    if(!empty($successMessage)){
                        echo "<p class='alert alert-success'>$successMessage</p>";
                    }
                ?>
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="my-2">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" id="name" class="form-control" name="full_name">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="my-2">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="number" id="phone" class="form-control" name="phone">
                        </div>
                    </div>
                    <div class="my-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" class="form-control" name="email">
                    </div>
                    <div class="my-2">
                        <label for="user_type">Choose</label>
                        <select name="user_type" id="user_type" class="form-control">
                            <option value="vendor">Vendor</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <div class="my-2">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" class="form-control" name="password">
                    </div>
                    <div class="my-2">
                        <label for="confirm" class="form-label">Confirm Password</label>
                        <input type="password" id="confirm" class="form-control" name="confirm">
                    </div>
                    <div>
                        <button class="btn btn-primary mt-3">
                            Sign Up
                        </button>
                    </div>
                </div>
                
            </div>
        </form>
    </div>
</div>

<?php 

include "footer.php";

?>