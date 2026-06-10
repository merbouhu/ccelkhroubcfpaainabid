<?php
// إعدادات الاتصال الخاصة باستضافة InfinityFree
$host = 'sql104.infinityfree.com'; 
$dbname = 'if0_41892705_centre_culturel_khroub'; 
$user = 'if0_41892705'; 
$pass = 'cfpaainabid'; // كلمة المرور الخاصة بقاعدة البيانات

try {
    // إنشاء الاتصال باستخدام PDO مع دعم الحروف العربية (utf8mb4)
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    
    // إعداد طريقة التعامل مع الأخطاء
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // إيقاف التنفيذ وعرض رسالة الخطأ في حال فشل الاتصال
    die("Erreur de connexion : " . $e->getMessage());
}
?>