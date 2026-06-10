<header class="navbar">
    <div class="logo"><?php echo $content[$lang]['title']; ?></div>
    <nav>
        <ul class="nav-links">
            <li><a href="index.php"><?php echo $content[$lang]['home']; ?></a></li>
            <li><a href="bibliotheque.php"><?php echo $content[$lang]['library']; ?></a></li>
            <li><a href="activities.php"><?php echo $content[$lang]['activities']; ?></a></li>
            <li><a href="login.php"><?php echo $content[$lang]['login']; ?></a></li>
            <li><a href="register.php" class="btn-reg"><?php echo $content[$lang]['register']; ?></a></li>
        </ul>
    </nav>
    <div class="lang-switcher">
        <?php if ($lang == 'ar'): ?>
            <a href="?lang=fr">Français</a>
        <?php else: ?>
            <a href="?lang=ar">العربية</a>
        <?php endif; ?>
    </div>
</header>