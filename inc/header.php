<?php
    $isLogin = isset($_SESSION['userId']) && $_SERVER['REQUEST_URI'] != '/ligatabelle/profil/logout.php';
?>
<header>
    <div>
        <a href="/ligatabelle/index.php">
            <img src="/ligatabelle/img/logo.png">
        </a>
        <h1>Deine Fußballliga</h1>
    </div>
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
                    <li><a href="/ligatabelle/liga">Meine Liegen</a></li>
                    <li><a href="/ligatabelle/liga/erstellen.php">Liga erstellen</a></li>
                </ul>
            </li>
            <li class="dropdown"><a>Profil</a>
                <ul class="dropdown-content">
                    <?php
                        if ($isLogin) {
                            echo '<li><a href="/ligatabelle/profil/">Mein Profil</a></li>';
                            if ($_SESSION['status'] === 'admin') {
                                echo '<li><a href="/ligatabelle/admin.php">Admintools</a></li>';
                            }
                            echo '<li><a href="/ligatabelle/profil/logout.php">Logout</a></li>';
                        } else {
                            echo '<li><a href="/ligatabelle/profil/login.php">Login</a></li>';
                            echo '<li><a href="/ligatabelle/profil/registrieren.php">Registrieren</a></li>';
                        }
                    ?>
                </ul>
            </li>
            <li class="suche">
                <form id="suche" action="/ligatabelle/suche.php" method="GET">
                    <input type="text" name="suche" placeholder="Suche">
                    <input type="hidden" name="liga" value="true">
                    <input type="hidden" name="user" value="true">
                    <input type="hidden" name="verein" value="true">
                    <button class="img_btn" title="Suchen"><img src="/ligatabelle/img/suche.png" class="img_btn"></button>
                </form>
            </li>
        </ul>
    </nav>
</header>
