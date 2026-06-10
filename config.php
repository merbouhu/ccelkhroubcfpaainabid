<?php
// Démarrage de la session pour garder en mémoire le choix de la langue
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Gestion du changement de langue via l'URL
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}

// Langue par défaut : Arabe ('ar')
$lang = $_SESSION['lang'] ?? 'ar';

// Définition de la direction (RTL pour l'arabe, LTR pour le français)
$dir = ($lang == 'ar') ? 'rtl' : 'ltr';

// Dictionnaire complet des traductions
$content = [
    'ar' => [
        'title' => 'المركز الثقافي أحمد اليزيد - الخروب',
        'home' => 'الرئيسية',
        'library' => 'المكتبة',
        'activities' => 'النشاطات',
        'login' => 'دخول الموظفين',
        'register' => 'التسجيل',
        'hero_h1' => 'مرحباً بكم في المركز الثقافي أحمد اليزيد',
        'hero_p' => 'فضاء للإبداع، المعرفة والثقافة بمدينة الخروب.',
        'about_title' => 'عن المركز',
        'about_text' => 'يعتبر المركز الثقافي أحمد اليزيد صرحاً معرفياً متميزاً في قلب مدينة الخروب. يسعى المركز إلى نشر الثقافة وتنمية المهارات من خلال مكتبة غنية تضم أكثر من 2000 عنوان في شتى المجالات. كما يضع تحت تصرفكم مدرجين (100 و400 مقعد)، بالإضافة إلى نوادٍ علمية مخصصة للشباب والأطفال، ومكاتب متخصصة تعنى بشؤون المرأة والطفل.',
        'reg_header' => 'طلب انضمام لنادي',
        'login_header' => 'تسجيل الدخول للموظفين',
        'email_label' => 'البريد الإلكتروني',
        'pass_label' => 'كلمة المرور',
        'last_name_ar' => 'اللقب (بالعربية)',
        'first_name_ar' => 'الاسم (بالعربية)',
        'last_name_fr' => 'اللقب (بالفرنسية)',
        'first_name_fr' => 'الاسم (بالفرنسية)',
        'birth_date' => 'تاريخ الميلاد',
        'phone' => 'رقم الهاتف',
        'club_choice' => 'اختر النادي/ الورشة',
        'btn_submit' => 'إرسال الطلب',
        'btn_login' => 'دخول',
        'club_1' => 'النادي العلمي',
        'club_2' => 'نادي القراءة',
        'address_label' => 'العنوان:',
        'address_text' => 'نهج جبهة التحرير الوطني، الخروب، قسنطينة',
        'phone_label' => 'الهاتف:',
        'map_title' => 'موقعنا على الخريطة',
        'get_directions' => 'بدء المسار (GPS)',
        // نصوص صفحة النشاطات المضافة حديثاً
        'page_activities_h1' => 'البرنامج السنوي للمركز الثقافي',
        'page_activities_p' => 'اكتشفوا مختلف التظاهرات الثقافية، التاريخية والدينية الموزعة على مدار السنة.',
    ],
    'fr' => [
        'title' => 'Centre Culturel Ahmed Yazid - El Khroub',
        'home' => 'Accueil',
        'library' => 'Bibliothèque',
        'activities' => 'Activités',
        'login' => 'Espace Staff',
        'register' => 'Inscription',
        'hero_h1' => 'Bienvenue au Centre Culturel Ahmed Yazid',
        'hero_p' => 'Un espace de création, de savoir et de culture à El Khroub.',
        'about_title' => 'À propos du centre',
        'about_text' => 'Le Centre Culturel Ahmed Yazid est un pilier du savoir au cœur d’El Khroub. Notre mission est de promouvoir la culture grâce à une bibliothèque de plus de 2000 titres. Le centre dispose d’infrastructures modernes, dont deux amphithéâtres de 100 et 400 places, ainsi que des bureaux spécialisés pour la culture et le binôme mère-enfant.',
        'reg_header' => 'Inscription à un club',
        'login_header' => 'Connexion Staff',
        'email_label' => 'Adresse Email',
        'pass_label' => 'Mot de passe',
        'last_name_ar' => 'Nom (Arabe)',
        'first_name_ar' => 'Prénom (Arabe)',
        'last_name_fr' => 'Nom (Français)',
        'first_name_fr' => 'Prénom (Français)',
        'birth_date' => 'Date de naissance',
        'phone' => 'N° de Téléphone',
        'club_choice' => 'Choisir le club / atelier',
        'btn_submit' => 'Envoyer l\'inscription',
        'btn_login' => 'Se connecter',
        'club_1' => 'Club Scientifique',
        'club_2' => 'Club de Lecture',
        'address_label' => 'Adresse :',
        'address_text' => 'Rue FLN, El Khroub, Constantine',
        'phone_label' => 'Téléphone :',
        'map_title' => 'Notre emplacement',
        'get_directions' => 'Lancer l\'itinéraire (GPS)',
        // نصوص صفحة النشاطات المضافة حديثاً
        'page_activities_h1' => 'Programme Annuel du Centre Culturel',
        'page_activities_p' => 'Découvrez les différentes manifestations culturelles, historiques et religieuses réparties tout au long de l\'année.',
    ]
];
?>