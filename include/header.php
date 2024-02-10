<header class="head-back">
    <div class="container-fluid text-center">
        <p class="navHeading-text">消費滿$500, 即送轉盤1次</p>
    </div>
</header>


<nav>
    <ul>
        <li><img style="height: 100px; width: 150px;" src="assets/images/10sec/Logo.png"></li>
        <li><img class="img-fluid" src="assets/images/navbar/magnifier.png"></li>
        <li><img class="img-fluid" src="assets/images/navbar/game-controller.png"></li>
        <li>
            <?php if (isset($_SESSION['userid'])) {
                ?>
                <a href="profile.php">
                    <img class="img-fluid" src="assets/images/navbar/account.png">
                </a>
                <?php
            } else {
                ?>
                <a href="login.php">
                    <img class="img-fluid" src="assets/images/navbar/account.png">
                </a>
                <?php
            } ?>
        </li>
        <li><a href="cart.php"><img class="img-fluid" src="assets/images/navbar/menu.png"></a></li>
    </ul>
</nav>

<a href="#" class="fixed-button">
    <img src="assets/images/wp.png" alt="Your Image">
</a>