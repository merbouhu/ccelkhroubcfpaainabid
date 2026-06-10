<?php
session_start();
require_once 'includes/db.php'; // تأكد من وجود ملف الاتصال

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['email']);
    $password = $_POST['password'];

    // استعلام لجلب المستخدم
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // تجربة التحقق المشفر ثم العادي
        if (password_verify($password, $user['password']) || $password === $user['password']) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['user_name'] = $user['full_name'];
            header("Location: admin.php"); // التوجيه للوحة التحكم
            exit();
        } else {
            echo "<script>alert('كلمة المرور غير صحيحة!'); window.location.href = 'login.php';</script>";
        }
    } else {
        echo "<script>alert('اسم المستخدم غير موجود!'); window.location.href = 'login.php';</script>";
    }
}
?>