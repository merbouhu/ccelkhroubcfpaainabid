<?php
require_once 'includes/db.php';
$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "UPDATE livres SET titre = ?, auteur = ?, quantite_dispo = ? WHERE id = ?";
    $pdo->prepare($sql)->execute([$_POST['titre'], $_POST['auteur'], $_POST['quantite'], $id]);
    header("Location: admin_books.php");
    exit();
}

$book = $pdo->prepare("SELECT * FROM livres WHERE id = ?");
$book->execute([$id]);
$data = $book->fetch();
?>
<form method="POST">
    <input type="text" name="titre" value="<?php echo htmlspecialchars($data['titre']); ?>">
    <input type="text" name="auteur" value="<?php echo htmlspecialchars($data['auteur']); ?>">
    <input type="number" name="quantite" value="<?php echo $data['quantite_dispo']; ?>">
    <button type="submit">حفظ التغييرات</button>
</form>