<?php 

include "./layout/header.php";

?>

<div class="container-fluid my-5 py-5">
    <div class="container py-5">
        <div class="form-group">
            <div class="row">
                <div class="my-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" class="form-control" name="email">
                </div>
                <div class="my-2">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" class="form-control" name="password">
                </div>
                <div>
                    <button class="btn btn-primary mt-3">
                        Login Up
                    </button>
                </div>
                <a href="signup.php" class="mt-3">you don't have account?</a>
            </div>
            
        </div>
    </div>
</div>

<?php 

include "./layout/footer.php";

?>