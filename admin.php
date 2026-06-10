<?php
session_start();

// 1. التحقق من الجلسة (Security)
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

require_once 'includes/db.php'; 

try {
    // 2. استخدام استعلامات آمنة ومنظمة
    $stmt_adh = $pdo->query("SELECT COUNT(*) FROM adherents");
    $total_adherents = $stmt_adh->fetchColumn();

    $stmt_livres = $pdo->query("SELECT SUM(quantite_dispo) FROM livres");
    $total_books = $stmt_livres->fetchColumn();

    $stmt_recent = $pdo->query("SELECT * FROM adherents ORDER BY id_adherent DESC LIMIT 5");
    $recent_adherents = $stmt_recent->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error = "خطأ في جلب البيانات: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>لوحة التحكم | المركز الثقافي</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .admin-container { padding: 40px 5%; }
        .stat-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-bottom: 40px; }
        .stat-card { background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); text-align: center; }
        .stat-card .number { font-size: 2em; color: var(--primary); font-weight: bold; }
        .admin-table { width: 100%; border-collapse: collapse; background: #fff; }
        .admin-table th, .admin-table td { padding: 15px; border-bottom: 1px solid #ddd; text-align: right; }
    </style>
</head>
<body>
<?php include('includes/admin_nav.php'); ?>
<div class="admin-container">
    <h1>لوحة تحكم الإدارة</h1>
    
    <?php if(isset($error)): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php else: ?>
        <div class="stat-grid">
            <div class="stat-card">
                <h3>إجمالي المنخرطين</h3>
                <div class="number"><?php echo (int)$total_adherents; ?></div>
            </div>
            <div class="stat-card">
                <h3>إجمالي الكتب المتوفرة</h3>
                <div class="number"><?php echo (int)$total_books; ?></div>
            </div>
        </div>

        <h3>آخر 5 منخرطين</h3>
       <table class="admin-table">
    <thead>
        <tr>
            <th>الرقم</th>
            <th>اللقب</th>
            <th>الاسم</th>
            <th>تاريخ الميلاد</th>
            <th>رقم الهاتف</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($recent_adherents)): ?>
            <?php foreach ($recent_adherents as $adh): ?>
                <tr>
                    <td><?php echo htmlspecialchars($adh['id_adherent']); ?></td>
                    <td><?php echo htmlspecialchars($adh['nom']); ?></td>
                    <td><?php echo htmlspecialchars($adh['prenom']); ?></td>
                    <td><?php echo htmlspecialchars($adh['date_naissance']); ?></td>
                    <td><?php echo htmlspecialchars($adh['telephone']); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="5" style="text-align:center;">لا يوجد منخرطون مسجلون حالياً.</td></tr>
        <?php endif; ?>
    </tbody>
</table>
    <?php endif; ?>
    
    <div style="margin-top: 20px;">
        <a href="logout.php" class="btn-auth">تسجيل الخروج</a>
    </div>
</div>

</body>
</html>