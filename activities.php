<?php
include('config.php');
require_once 'includes/db.php'; 

$events = [];
$current_month = (int)date('n');

if (isset($pdo)) {
    try {
        $stmt = $pdo->query("SELECT * FROM evenements ORDER BY mois_num ASC");
        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "";
    }
}
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $dir; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $content[$lang]['page_activities_h1']; ?> - <?php echo $content[$lang]['title']; ?></title>
    
    <link rel="stylesheet" href="style.css">
    <?php if ($dir == 'rtl'): ?>
        <link rel="stylesheet" href="style.css">
    <?php endif; ?>
    
    <?php include('includes/header.php'); ?>
</head>
<body>

<main class="events-page">
    <header class="page-intro">
        <h1><?php echo $content[$lang]['page_activities_h1']; ?></h1>
        <p><?php echo $content[$lang]['page_activities_p']; ?></p>
    </header>

    <div class="events-grid">
        <?php if (count($events) > 0): ?>
            <?php foreach ($events as $event): ?>
                <?php 
                    $month_name = ($lang == 'ar') ? $event['mois_name_ar'] : $event['mois_name_fr'];
                    // هنا قمنا بإضافة المتغير الخاص بالتاريخ
                    $date_event = ($lang == 'ar') ? $event['date_ar'] : $event['date_fr'];
                    $title      = ($lang == 'ar') ? $event['titre_ar']      : $event['titre_fr'];
                    $desc       = ($lang == 'ar') ? $event['desc_ar']       : $event['desc_fr'];
                    $num        = (int)$event['mois_num'];
                    
                    $time_status = ($num < $current_month) ? 'past-event' : 'upcoming-event';
                ?>
                <div class="event-card <?php echo $time_status; ?>">
                    <div class="event-month">
                        <?php echo htmlspecialchars($month_name); ?>
                    </div>
                    <div class="event-body">
                        <h3><?php echo htmlspecialchars($title); ?></h3>
                        <span class="event-date">📅 <?php echo htmlspecialchars($date_event); ?></span>
                        <p><?php echo htmlspecialchars($desc); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="no-events" style="text-align: center; width: 100%; padding: 40px; color: #666; font-size: 1.2rem;">
                <p><?php echo ($lang == 'ar') ? 'لا توجد نشاطات حالياً في قاعدة البيانات.' : 'Aucun événement trouvé dans la base de données.'; ?></p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php include('includes/footer.php'); ?>
</body>
</html>