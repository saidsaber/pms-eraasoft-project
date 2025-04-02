
<?php 
session_start();
require_once('inc/header.php'); 
include 'headers/viewCart.php';
if(empty($_SESSION['user'])){
    echo "<p class='error'>You must <a href='login.php'>log in</a> first.</p>";
    exit;
}
?>

<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Shop in style</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach(getData() as $cart):
                        ?>
                        <tr>
                            <th scope="row"><img src="images/<?= $cart['image']?>" alt=""></th>
                            <td><?= $cart['productName']?></td>
                            <td><?= $cart['price']?> EGP</td>
                            <td>
                                <input type="number" value="<?= $cart['count']?>">
                            </td>
                            <td><?= $cart['total']?> EGP</td>
                            <td>
                                <a href="headers/delete.php?id=<?= $cart['id']?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                        <tr>
                            <td colspan="2">
                                Tatal Price
                            </td>
                            <td colspan="3">
                                <h3><?= getTotal()?> EGP</h3>
                            </td>
                            <td>
                                <a href="checkout.php" class="btn btn-primary">Checkout</a>
                            </td>
                        </tr>
                </table>
            </div>
        </div>
    </div>
</section>
<?php require_once('inc/footer.php'); ?>
