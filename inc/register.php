<?php
include('core/mainFuntion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل دخول</title>
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
</style>
<body>
    <div class="con">
        <form action="headers/register.php" method="post">
            <label style="display:<?= setError() == null ? 'none' : 'block'?>"><?= setError()?></label>
            <input type="text" name="name" placeholder="Your Name" value="<?= old('name')?>">
            <label style="display:<?= displayError('name')?>"><?= showError('name')?></label>
            <input type="password" name="password" placeholder="Password" value="<?= old('password')?>">
            <label style="display:<?= displayError('password')?>"><?= showError('password')?></label>
            <input type="submit" value="send" name="save">
            <a href="login.php">انشاء حساب</a>
        </form>
    </div>
    <?php
    $_SESSION['egnore'] = null;
    $_SESSION['error'] = null;
    ?>
</body>
</html>