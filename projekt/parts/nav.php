<?php
// Inklúzia triedy Menu
include_once "classes/Menu.php";

// Vytvorenie inštancie triedy Menu
$menu = new Menu();

// Získanie dát menu z triedy
$menuData = $menu->getMenuData();
?>

<nav class="navbar navbar-expand-xl navbar-light bg-light">
    <a class="navbar-brand" href="index.php">
        <i class="fas fa-3x fa-tachometer-alt tm-site-icon"></i>
        <h1 class="tm-site-title mb-0">Dashboard</h1> <!-- Názov stránky zobrazený v navigačnom paneli -->
    </a>
    <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
            <?php
            // Prechádzanie položkami menu a ich zobrazenie
            foreach ($menuData as $item) {
                echo '<li class="nav-item"><a class="nav-link" href="' . $item['url'] . '">' . $item['name'] . '</a></li>';
            }
            ?>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link d-flex" href="login.php">
                    <i class="far fa-user mr-2 tm-logout-icon"></i> <!-- Ikona odhlásenia -->
                    <span>Logout</span> <!-- Text pre odhlásenie -->
                </a>
            </li>
        </ul>
    </div>
</nav>
</nav>