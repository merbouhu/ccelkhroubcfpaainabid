<?php
session_start();
require_once 'includes/db.php'; // Connexion à la base de données

if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
$lang = $_SESSION['lang'] ?? 'ar';
$dir = ($lang == 'ar') ? 'rtl' : 'ltr';

// Récupération du filtre de langue des livres (par défaut 'all' pour tout afficher)
$filter_lang = $_GET['book_lang'] ?? 'all';

// Textes de l'interface de la bibliothèque
$content = [
    'ar' => [
        'title' => 'المركز الثقافي أحمد اليزيد - الخروب',
        'lib_title' => 'مكتبة المركز الرقمية',
        'lib_subtitle' => 'تصفح واكتشف أكثر من 2000 عنوان متوفر في مختلف المجالات.',
        'all_books' => 'كل الكتب',
        'ar_books' => 'كتب باللغة العربية',
        'fr_books' => 'كتب باللغة الفرنسية',
        'en_books' => 'كتب باللغة الإنجليزية',
        'author' => 'المؤلف:',
        'category' => 'المجال:',
        'year' => 'سنة النشر:',
        'available' => 'الكمية المتوفرة:',
        'no_books' => 'لا توجد كتب متوفرة في هذا القسم حالياً.',
        'home' => 'الرئيسية',
        'library' => 'المكتبة',
    ],
    'fr' => [
        'title' => 'Centre Culturel Ahmed Yazid - El Khroub',
        'lib_title' => 'Bibliothèque du Centre',
        'lib_subtitle' => 'Explorez et découvrez plus de 2000 titres disponibles dans divers domaines.',
        'all_books' => 'Tous les livres',
        'ar_books' => 'Livres en Arabe',
        'fr_books' => 'Livres en Français',
        'en_books' => 'Livres en Anglais',
        'author' => 'Auteur :',
        'category' => 'Catégorie :',
        'year' => 'Année :',
        'available' => 'Disponibles :',
        'no_books' => 'Aucun livre disponible dans cette section pour le moment.',
        'home' => 'Accueil',
        'library' => 'Bibliothèque',
    ]
];

// Préparation de la requête SQL en fonction du filtre choisi
if ($filter_lang !== 'all' && in_array($filter_lang, ['ar', 'fr', 'en'])) {
    
    // ربط اختصارات الأزرار بالكلمات الموجودة فعلياً في قاعدة البيانات
    $db_langs = [
        'ar' => 'العربية',
        'fr' => 'Français',
        'en' => 'English'
    ];
    $langue_recherche = $db_langs[$filter_lang];

    $sql = "SELECT l.*, c.nom_ar, c.nom_fr 
            FROM livres l 
            LEFT JOIN categories c ON l.id_categorie = c.id_categorie 
            WHERE l.langue = :langue 
            ORDER BY l.titre ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['langue' => $langue_recherche]);
} else {
    $sql = "SELECT l.*, c.nom_ar, c.nom_fr 
            FROM livres l 
            LEFT JOIN categories c ON l.id_categorie = c.id_categorie 
            ORDER BY l.titre ASC";
    $stmt = $pdo->query($sql);
}
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $dir; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $content[$lang]['lib_title']; ?> - <?php echo $content[$lang]['title']; ?></title>
    <link rel="stylesheet" href="style.css">
    <?php if ($dir == 'rtl'): ?>
        <link rel="stylesheet" href="style.css">
    <?php endif; ?>
</head>
<body>

<header class="navbar">
    <div class="logo"><?php echo $content[$lang]['title']; ?></div>
    <nav>
        <ul class="nav-links">
            <li><a href="index.php"><?php echo $content[$lang]['home']; ?></a></li>
            <li><a href="bibliotheque.php" class="active"><?php echo $content[$lang]['library']; ?></a></li>
        </ul>
    </nav>
    <div class="lang-switcher">
        <a href="?lang=<?php echo ($lang == 'ar') ? 'fr' : 'ar'; ?>&book_lang=<?php echo $filter_lang; ?>">
            <?php echo ($lang == 'ar') ? 'Français' : 'العربية'; ?>
        </a>
    </div>
</header>

<section class="lib-hero">
    <h1><?php echo $content[$lang]['lib_title']; ?></h1>
    <p><?php echo $content[$lang]['lib_subtitle']; ?></p>
</section>

<div class="filter-container">
    <a href="?book_lang=all" class="btn-filter <?php echo $filter_lang == 'all' ? 'active' : ''; ?>"><?php echo $content[$lang]['all_books']; ?></a>
    <a href="?book_lang=ar" class="btn-filter <?php echo $filter_lang == 'ar' ? 'active' : ''; ?>"><?php echo $content[$lang]['ar_books']; ?></a>
    <a href="?book_lang=fr" class="btn-filter <?php echo $filter_lang == 'fr' ? 'active' : ''; ?>"><?php echo $content[$lang]['fr_books']; ?></a>
    <a href="?book_lang=en" class="btn-filter <?php echo $filter_lang == 'en' ? 'active' : ''; ?>"><?php echo $content[$lang]['en_books']; ?></a>
</div>

<main class="library-grid-container">
    <?php if (count($books) > 0): ?>
        <div class="books-grid">
            <?php foreach ($books as $book): ?>
                <div class="book-card lang-<?php echo $book['langue']; ?>">
                    <div class="book-badge"><?php echo strtoupper($book['langue']); ?></div>
                    <div class="book-info">
                        <h3><?php echo htmlspecialchars($book['titre']); ?></h3>
                        <p><strong><?php echo $content[$lang]['author']; ?></strong> <?php echo htmlspecialchars($book['auteur']); ?></p>
                        <p><strong><?php echo $content[$lang]['category']; ?></strong> 
                            <?php echo $lang == 'ar' ? htmlspecialchars($book['nom_ar']) : htmlspecialchars($book['nom_fr']); ?>
                        </p>
                        <p><strong><?php echo $content[$lang]['year']; ?></strong> <?php echo $book['annee_publication'] ?? '/'; ?></p>
                    </div>
                    <div class="book-footer">
                        <span><?php echo $content[$lang]['available']; ?> <strong><?php echo $book['quantite_dispo']; ?></strong></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="no-results"><?php echo $content[$lang]['no_books']; ?></p>
    <?php endif; ?>
</main>

</body>
</html>
