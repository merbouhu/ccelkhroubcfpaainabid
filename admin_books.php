<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) { header("Location: login.php"); exit(); }
require_once 'includes/db.php';

$books = $pdo->query("SELECT * FROM livres")->fetchAll(PDO::FETCH_ASSOC);
?>
<table class="admin-table">
    <tr>
        <th>العنوان</th>
        <th>المؤلف</th>
        <th>الكمية</th>
        <th>الإجراء</th>
    </tr>
    <?php foreach ($books as $book): ?>
    <tr>
        <td><?php echo htmlspecialchars($book['titre']); ?></td>
        <td><?php echo htmlspecialchars($book['auteur']); ?></td>
        <td><?php echo $book['quantite_dispo']; ?></td>
        <td><a href="edit_book.php?id=<?php echo $book['id']; ?>">تعديل</a></td>
    </tr>
    <?php endforeach; ?>
</table>