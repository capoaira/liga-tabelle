<?php
    $isLogin = isset($_SESSION['userId']) && $_SERVER['REQUEST_URI'] != '/ligatabelle/profil/logout.php';
?>
<header>
    <a href="/ligatabelle/index.php">
        <img src="/ligatabelle/img/logo.png">
    </a>
    <input type="checkbox" id="smartphone-btn">
    <label for="smartphone-btn" class="smartphone-btn">
        <span class="line"></span>
        <span class="line"></span>
        <span class="line"></span>
    </label>
    <nav>
        <ul>
            <li><a href="/ligatabelle/index.php">Home</a></li>
            <li class="dropdown"><a>Liga</a>
                <ul class="dropdown-content">
                    <li class="dropdown"><a href="/ligatabelle/liga">Meine Liegen</a></li>
                    <li class="dropdown"><a href="/ligatabelle/liga/erstellen.php">Liga erstellen</a></li>
                </ul>
            </li>
            <li class="dropdown"><a>Profil</a>
                <ul class="dropdown-content">
                    <?php
                        if ($isLogin) {
                            echo '<li><a href="/ligatabelle/profil/">Mein Profil</a></li>';
                            echo '<li><a href="/ligatabelle/profil/logout.php">Logout</a></li>';
                        } else {
                            echo '<li><a href="/ligatabelle/profil/login.php">Login</a></li>';
                        }
                    ?>
                </ul>
            </li>
        </ul>
    </nav>
</header>
