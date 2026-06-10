<?php
include('config.php');
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $dir; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $content[$lang]['login_header']; ?> | <?php echo $content[$lang]['title']; ?></title>
    <link rel="stylesheet" href="style.css">
    <?php if ($dir == 'rtl'): ?>
        <link rel="stylesheet" href="style.css">
    <?php endif; ?>
</head>
<body>

<?php include('includes/header.php'); ?>

<section class="auth-section">
    <div class="login-card">
        <h2><?php echo $content[$lang]['login_header']; ?></h2>
        <form action="process_login.php" method="POST">
            <div class="form-group">
                <label><?php echo $content[$lang]['email_label']; ?></label>
                <input type="text" name="email" required placeholder="admin">
            </div>
            <div class="form-group">
                <label><?php echo $content[$lang]['pass_label']; ?></label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" class="btn-auth"><?php echo $content[$lang]['btn_login']; ?></button>
        </form>
    </div>
</section>

</body>
</html>