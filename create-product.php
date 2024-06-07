<?php

include './layout/header.php';

?>


<div class="container my-5 py-5">
    <div class="row my-5 ">
        <div class="my-2">
            <label for="pdname" class="form-label">Product Name</label>
            <input type="text" id="pdname" class="form-control" name="pdname">
        </div>
        <div class="my-2">
            <label for="pdprice" class="form-label">Product Price</label>
            <input type="number" id="pdprice" class="form-control" name="pdprice">
        </div>
        <div class="my-2">
            <label for="pddesc" class="form-label">Description</label>
            <input type="text" id="pddesc" class="form-control" name="pddesc">
        </div>
        <div class="my-2">
            <label for="pdname" class="form-label">Product Image</label>
            <input type="file" id="pdname" class="form-control" name="pdname" accept="image/*">
        </div>
        <div>
            <button class="btn btn-primary mt-3">
                Create
            </button>
        </div>
        <a href="signup.php" class="mt-3">you don't have account?</a>
    </div>
</div>


<?php

include './layout/footer.php';

?>