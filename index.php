<?php
include('config.php');
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $dir; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $content[$lang]['title']; ?></title>
    <link rel="stylesheet" href="style.css">
    <?php if ($dir == 'rtl'): ?>
        <link rel="stylesheet" href="style.css">
    <?php endif; ?>
    <?php include('includes/header.php'); ?>

</head>
<body>

<section class="hero-container">
    
    <div class="hero-text">
        <h1><?php echo $content[$lang]['hero_h1']; ?></h1>
        <p><?php echo $content[$lang]['hero_p']; ?></p>
        <div class="hero-image">
        <img src="images/centre.jpg" alt="Centre Culturel Ahmed Yazid">
    </div>
       <div class="about-container">
    <h2><?php echo $content[$lang]['about_title']; ?></h2>
    <p><?php echo $content[$lang]['about_text']; ?></p>
</div>
    </div>
</section>
</body>
    <?php include('includes/footer.php'); ?>
</html>