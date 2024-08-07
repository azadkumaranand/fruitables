<?php 
// sesstion_start();
// include "./header.php";
include "./header.php";
// include "./addtocart.php";
// echo "<pre>";
// print_r($allData);

?>


        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Cart</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Cart</li>
            </ol>
        </div>
        <!-- Single Page Header End -->

        <div class="alert alert-success alert-dismissible fade show alert-message-for-success-remove-from-cart" style="position:fixed; bottom:50px; right: 0; display:none" role="alert">
                <strong class="removeMessage"></strong>
                <button type="button" style="position:absolute; right:0;background: none; border: none; font-size: 32px; top: 5px;" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <!-- Cart Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="table-responsive">
                    <table class="table">
                        
                        <thead>
                          <tr>
                            <th scope="col">Products</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Handle</th>
                          </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                            $sumtotal = 0;
                            $shippingamount = 30;
                            foreach($allData as $key=>$value){ 
                                // print_r($value);
                                $sumtotal = $sumtotal + $value['price']*$value['product_count'];
                                ?>
                            <tr id="<?php echo 'cart-item'.$value['id']; ?>">
                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        <img src="<?php echo $value['image']; ?>" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                    </div>
                                </th>
                                <td>
                                    <p class="mb-0 mt-4"><?php echo $value['product_name']; ?></p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">Rs <?php echo $value['price']; ?></p>
                                </td>
                                <td>
                                    <div class="input-group quantity mt-4" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-minus rounded-circle bg-light border" >
                                            <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control form-control-sm text-center border-0" value="<?php echo $value['product_count']; ?>">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">Rs <?php echo $value['price']*$value['product_count']; ?></p>
                                </td>
                                <td>
                                    <button data="<?php echo $value['id']; ?>" class="btn btn-md rounded-circle bg-light border mt-4 remove-cart-item-btn" >
                                        <i class="fa fa-times text-danger"></i>
                                    </button>
                                </td>
                            
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="mt-5">
                    <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code">
                    <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Apply Coupon</button>
                </div>
                <div class="row g-4 justify-content-end">
                    <div class="col-8"></div>
                    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                        <div class="bg-light rounded">
                            <div class="p-4">
                                <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                                <div class="d-flex justify-content-between mb-4">
                                    <h5 class="mb-0 me-4">Subtotal:</h5>
                                    <p class="mb-0"><?php echo "Rs: ".$sumtotal; ?></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h5 class="mb-0 me-4">Shipping</h5>
                                    <div class="">
                                        <p class="mb-0">Flat rate: Rs: <?php echo $shippingamount; ?></p>
                                    </div>
                                </div>
                                <p class="mb-0 text-end">Shipping to India.</p>
                            </div>
                            <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                <h5 class="mb-0 ps-4 me-4">Total</h5>
                                <p class="mb-0 pe-4"><?php echo "Rs: ".$sumtotal+$shippingamount; ?></p>
                            </div>
                            <a href="chackout.php?totalamount=<?php echo base64_encode($sumtotal+$shippingamount); ?>">
                                <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button">Proceed Checkout</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart Page End -->


        <script>
            const removeCartItemBtn = document.querySelectorAll('.remove-cart-item-btn');
            const removeMessage = document.querySelector('.removeMessage');
            const removeMessageFromCart = document.querySelector('.alert-message-for-success-remove-from-cart');

            removeCartItemBtn.forEach((removeBtn) => {
                removeBtn.addEventListener('click', (e)=>{
                    let product_id = removeBtn.getAttribute('data');
                    // alert(`You want remvoe ${product_id} item`);
                    // console.log('#cart-itme'+`${product_id}`);

                    const cart_item_to_remove = document.querySelector('#cart-item'+`${product_id}`);
                    const cart_count = document.querySelector('#cart_count');

                    // console.log(cart_item_to_remove);

                    let xhr = new XMLHttpRequest();

                    let data = new FormData();

                    data.append('product_id', product_id);
                    // data.append('name', 'azad');

                    xhr.open('POST', 'http://localhost/fruitables/carthandle.php');

                    // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                    xhr.onload = function (){
                        if(xhr.status == 200){
                            removeMessageFromCart.style.display = 'block';
                            removeMessage.innerText = "Product removed";
                            let arr = JSON.parse(xhr.responseText);
                            // console.log(JSON.parse(xhr.responseText));
                            // console.log(Array.from(JSON.parse(xhr.responseText)));
                            cart_count.innerText = arr.length;
                            console.log(xhr.responseText);
                            cart_item_to_remove.style.display = 'none';
                        }
                    }

                    // let data = "product_id="+product_id;
                    xhr.send(data);

                })
            });
        </script>


        <?php 

include "./footer.php";

?>