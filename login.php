<?php
session_start();

include "./layout/header.php";
require './db/connect.php';
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();

        if ($data['password'] == $pass) {
            // Store data in session variables
            $_SESSION['name'] = $data['fullname'];
            $_SESSION['user_id'] = $data['id'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['phone'] = $data['phone'];
            $_SESSION['user_type'] = $data['role'];

            // Redirect to index.php
            header("Location: index.php");
            exit(); // Ensure no further code is executed
        } else {
            $error_message = "Wrong Password";
        }
    } else {
        $error_message = "No user found with this email";
    }
}

?>

<div class="container-fluid my-5 py-5">
    <div class="container py-5">
        <div class="form-group">
            <form action="" method="post">
                <?php 
                if (!empty($error_message)) {
                    echo "<p class='alert alert-danger'>$error_message</p>";
                }
                ?>
                <div class="row">
                    <div class="my-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" class="form-control" name="email" required>
                    </div>
                    <div class="my-2">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" class="form-control" name="password" required>
                    </div>
                    <div>
                        <button class="btn btn-primary mt-3">
                            Login
                        </button>
                    </div>
                    <a href="signup.php" class="mt-3">You don't have an account?</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php 
include "./layout/footer.php"; 
?>
