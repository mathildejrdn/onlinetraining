<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Document</title>
</head>
<body>
<nav >
    <div id="navbar-items">
        <div id="logo-site">
            <a href="../index.php"><img src="./images/logo.png"></a>
        </div>
        <div id="logos-navbar">
            <a href="../back_office/userlist.php"><i class="fa-solid fa-gear fa-2x"></i></a>
            <?php if(!isset($_SESSION["user"])): ?>
            <a href="../client_side/login.php"><i  class="fa-solid fa-user fa-2x"></i></a>
            <?php else : ?>
            <a href="../client_side/logout.php"><i  class="fa-solid fa-right-from-bracket fa-2x"></i></a>
            <?php endif; ?>
            <a href="../panier.php"><i id="panier" class="fa-solid fa-cart-shopping fa-2x"></i></a>
        </div>
    </div>
</nav>
</body>
</html>