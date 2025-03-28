
<?php require_once ('inc/header.php'); session_start();?>
<?php
if(!empty($_SESSION['addCart'])){
    echo "<p class='error'>{$_SESSION['addCart'][0]}</p>";
    $_SESSION['addCart'] = null;
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
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
                $fileProductssData = 'assets/products.json';
                $products = file_exists($fileProductssData)? json_decode(file_get_contents($fileProductssData) , true) : [];
                foreach($products as $product):   
            ?>
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="images/<?= $product['path']?>" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder"><?= $product['name']?></h5>
                            <!-- Product reviews-->
                            <div class="d-flex justify-content-center small text-warning mb-2">
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>
                            <!-- Product price-->
                            <?= $product['price']?>EGP
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="headers/addCart.php?id=<?= $product['id']?>">Add to cart</a></div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</section>
<?php require_once ('inc/footer.php'); ?>
<div class="con">

    <?php 
        if(empty($_SESSION['user'])){
            echo '<a href="login.php">login</a>';
        }else{
            echo "<span>{$_SESSION['user']['name']}</span>";
            echo '<a href="headers/logout.php">logout</a>';
        }
    ?>
</div>
