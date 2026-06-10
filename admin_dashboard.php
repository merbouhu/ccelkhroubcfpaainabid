<?php
session_start();
// الحارس: إذا لم توجد جلسة دخول، أعده لصفحة الدخول
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include('config.php');
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $dir; ?>">
<head>
    <meta charset="UTF-8">
    <title>لوحة التحكم | <?php echo $content[$lang]['title']; ?></title>
    <link rel="stylesheet" href="style.css">
    <style>
        .admin-container { padding: 40px 5%; }
        .dashboard-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-top: 30px; }
        .admin-card { background: white; padding: 20px; border-radius: 10px; text-align: center; box-shadow: 0 4px 6px rgba(0,0,0,0.1); text-decoration: none; color: var(--primary); font-weight: bold; border-top: 4px solid var(--accent); transition: 0.3s; }
        .admin-card:hover { transform: translateY(-5px); background: var(--primary); color: white; }
    </style>
</head>
<body>
    <div class="admin-container">
        <h1>مرحباً بك يا <?php echo $_SESSION['user_name']; ?> 👋</h1>
        <p>أنت الآن في لوحة تحكم المركز الثقافي. اختر المهمة التي تود القيام بها:</p>
        
        <div class="dashboard-grid">
            <a href="admin_books.php" class="admin-card">إدارة المكتبة</a>
            <a href="admin_events.php" class="admin-card">إدارة النشاطات</a>
            <a href="admin_members.php" class="admin-card">طلبات الانضمام</a>
            <a href="logout.php" class="admin-card" style="background:#e74c3c; color:white; border:none;">تسجيل الخروج</a>
        </div>
    </div>
</body>
</html>