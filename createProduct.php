<?php
    include('core/mainFuntion.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create product</title>
</head>
<style>
    *{
        padding: 0;
        margin: 0;
    }
    .con form a {
        text-decoration: none;
        text-align: center;
    }
    .con {
        width: 100%;
        height: 100vh;
        display: grid;
        align-items: center;
        justify-content: center;
    }
    form {
        display: grid;
        gap: 5px;
    }
    input {
        text-align: center;
        padding: 5px;
        border: 1px solid black;
        border-radius: 3px;
        width: 40vw;
        box-sizing: border-box;
        background: white;
        color: black;
        font-size: 15px;
    }
    input[type="submit"] {
        background: black;
        color: white;
        cursor: pointer;
    }
    label {
        background: #ff6464;
        text-align: center;
        padding: 5px;
        border-radius: 3px;
        color: white;
    }
    input#image+label {
        background: black;
    }
</style>
<body>
    <div class="con">
        <form action="headers/createProduct.php" method="post" enctype="multipart/form-data">
            <label style="display:<?= showImageError() == null ? 'none' : 'block'?>"><?= showImageError()?></label>
            <input type="text" name="name" placeholder="Name Product" value="<?= old('name')?>">
            <label style="display:<?= displayError('name')?>"><?= showError('name')?></label>
            <input type="text" name="price" placeholder="Price Product" value="<?= old('price')?>">
            <label style="display:<?= displayError('price')?>"><?= showError('price')?></label>
            <input type="file" name="image" id="image" style="display: none">
            <label for="image">upload image</label>
            <input type="submit" value="send" name="save">
        </form>
    </div>
    <?php
    session_unset();
    session_destroy();
    ?>
</body>
</html>