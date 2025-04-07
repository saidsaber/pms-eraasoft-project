<?php 
session_start();
require_once('inc/header.php'); 
include 'headers/viewCart.php';
include 'core/mainFuntion.php';
if(empty($_SESSION['user'])){
    echo "<p class='error'>You must log in first.</p>";
    exit;
}
?>
<style>
        input+label {
        background: #ff6464;
        text-align: center;
        padding: 5px;
        border-radius: 3px;
        color: white;
    }
</style>
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
            <div class="col-4">
                <div class="border p-2">
                    <div class="products">
                        <ul class="list-unstyled">
                            <?php
                            foreach(getData() as $product):
                            ?>
                            <li class="border p-2 my-1"> <p style="display:inline"><?= $product['productName']?></p> -
                                <span class="text-success mx-2 mr-auto bold"><?= $product['count'] ." * ".$product['price']?></span>
                            </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                    <h3>Total : <?= getTotal()?> EGP</h3>
                </div>
            </div>
            <div class="col-8">
                <form action="headers/checkout.php" method="post" class="form border my-2 p-3">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" id="" class="form-control" value="<?= old('name')?>">
                            <label style="display:<?= displayError('name')?>"><?= showError('name')?></label>
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="text" name="email" id="" class="form-control" value="<?= old('email')?>">
                            <label style="display:<?= displayError('email')?>"><?= showError('email')?></label>
                        </div>
                        <div class="mb-3">
                            <label for="">Address</label>
                            <input type="text" name="address" id="" class="form-control" value="<?= old('address')?>">
                            <label style="display:<?= displayError('address')?>"><?= showError('address')?></label>
                        </div>
                        <div class="mb-3">
                            <label for="">Phone</label>
                            <input type="number" name="phone" id="" class="form-control" value="<?= old('phone')?>">
                            <label style="display:<?= displayError('phone')?>"><?= showError('phone')?></label>
                        </div>
                        <div class="mb-3">
                            <label for="">Notes</label>
                            <input type="text" name="notes" id="" class="form-control" value="<?= old('notes')?>">
                            <label style="display:<?= displayError('notes')?>"><?= showError('notes')?></label>
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Send" name="send" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php 
$_SESSION['error'] = null;
require_once('inc/footer.php'); ?>