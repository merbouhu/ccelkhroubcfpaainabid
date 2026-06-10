<?php
session_start();
// الحماية: التحقق من تسجيل الدخول
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}
require_once 'includes/db.php';

// جلب كل المنخرطين من القاعدة
$stmt = $pdo->query("SELECT * FROM adherents ORDER BY id_adherent DESC");
$adherents = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>إدارة المنخرطين</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="admin-container">
        <h1>قائمة طلبات الانضمام</h1>
        <table border="1" style="width:100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr style="background-color: #f4f4f4;">
                    <th>الاسم الكامل</th>
                    <th>رقم الهاتف</th>
                    <th>تاريخ الميلاد</th>
                    <th>النادي المختار</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($adherents as $adh): ?>
                <tr>
                    <td><?php echo htmlspecialchars($adh['nom_ar'] . ' ' . $adh['prenom_ar']); ?></td>
                    <td><?php echo htmlspecialchars($adh['telephone']); ?></td>
                    <td><?php echo htmlspecialchars($adh['date_naiss']); ?></td>
                    <td><?php echo htmlspecialchars($adh['id_club']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <a href="admin.php">العودة للوحة التحكم</a>
    </div>
</body>
</html>