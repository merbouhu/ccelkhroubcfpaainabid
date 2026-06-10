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


<section class="auth-section">
    <div class="register-card">
        <h2><?php echo $content[$lang]['reg_header']; ?></h2>
        <form action="process_register.php" method="POST">
            
            <div class="form-row">
                <div class="form-group">
                    <label><?php echo $content[$lang]['last_name_ar']; ?></label>
                    <input type="text" name="nom_ar" required>
                </div>
                <div class="form-group">
                    <label><?php echo $content[$lang]['first_name_ar']; ?></label>
                    <input type="text" name="prenom_ar" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label><?php echo $content[$lang]['last_name_fr']; ?></label>
                    <input type="text" name="nom_fr" required>
                </div>
                <div class="form-group">
                    <label><?php echo $content[$lang]['first_name_fr']; ?></label>
                    <input type="text" name="prenom_fr" required>
                </div>
            </div>

            <div class="form-group">
                <label><?php echo $content[$lang]['birth_date']; ?></label>
                <input type="date" name="date_naiss" required>
            </div>

            <div class="form-group">
                <label><?php echo $content[$lang]['phone']; ?></label>
                <input type="tel" name="telephone" placeholder="05XXXXXXXX" required>
            </div>

            <div class="form-group">
                <label><?php echo $content[$lang]['club_choice']; ?></label>
                <select name="id_club" required>
                    <option value="1"><?php echo $content[$lang]['club_1']; ?></option>
                    <option value="2"><?php echo $content[$lang]['club_2']; ?></option>
                    <option value="3"><?php echo $content[$lang]['club_3']; ?></option>
                </select>
            </div>

            <button type="submit" class="btn-auth"><?php echo $content[$lang]['btn_submit']; ?></button>
        </form>
    </div>
</section>
</body>
    <?php include('includes/footer.php'); ?>
</html>
