-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : sql104.infinityfree.com
-- Généré le :  mar. 09 juin 2026 à 09:21
-- Version du serveur :  11.4.12-MariaDB
-- Version de PHP :  7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `if0_41892705_centre_culturel_khroub`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherents`
--

CREATE TABLE `adherents` (
  `id_adherent` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `telephone` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `adherents`
--

INSERT INTO `adherents` (`id_adherent`, `nom`, `prenom`, `date_naissance`, `telephone`) VALUES
(1, 'بوعبد الله', 'أمين', '1998-05-14', '0555123456'),
(2, 'منصوري', 'فاطمة الزهراء', '2001-09-22', '0666987654'),
(3, 'قاسمي', 'ياسين', '1995-11-03', '0777456123'),
(4, 'دراجي', 'سارة', '2004-01-18', '0551239874'),
(5, 'براهيمي', 'محمد', '1990-07-30', '0662589631'),
(6, 'لعريبي', 'خديجة', '1999-12-12', '0778965412'),
(7, 'زياني', 'كريم', '1985-04-25', '0554789632'),
(8, 'حداد', 'أمينة', '2005-08-08', '0663258741'),
(9, 'بن علي', 'رضا', '1992-02-14', '0771456987'),
(10, 'مزياني', 'سمية', '1997-06-30', '0558963214'),
(11, 'طالبي', 'عبد الرؤوف', '2000-11-11', '0669874123'),
(12, 'عثماني', 'مريم', '2003-03-21', '0775632147'),
(13, 'بوزيد', 'طارق', '1988-09-09', '0556321478'),
(14, 'سعدي', 'نوال', '1996-07-07', '0665478963'),
(15, 'كريمي', 'وليد', '2002-12-05', '0778523691');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_categorie` int(11) NOT NULL,
  `nom_ar` varchar(100) NOT NULL,
  `nom_fr` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `nom_ar`, `nom_fr`) VALUES
(1, 'أدب وروايات', 'Littérature et Romans'),
(2, 'تاريخ وجغرافيا', 'Histoire et Géographie'),
(3, 'علوم وتكنولوجيا', 'Sciences et Technologies'),
(4, 'علوم دينية', 'Sciences Religieuses'),
(5, 'تنمية بشرية', 'Développement Personnel'),
(6, 'فلسفة وفكر', 'Philosophie et Pensée'),
(7, 'كتب أطفال', 'Livres pour Enfants'),
(8, 'فنون وثقافة', 'Arts et Culture');

-- --------------------------------------------------------

--
-- Structure de la table `emprunts`
--

CREATE TABLE `emprunts` (
  `id_adherent` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL,
  `date_emprunt` date DEFAULT NULL,
  `date_retour` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `emprunts`
--

INSERT INTO `emprunts` (`id_adherent`, `id_livre`, `date_emprunt`, `date_retour`) VALUES
(1, 2, '2024-03-01', '2024-03-15'),
(2, 7, '2024-03-05', '2024-03-20'),
(3, 1, '2024-03-10', '2024-03-25'),
(4, 18, '2024-03-12', '2024-03-27'),
(5, 12, '2024-03-15', '2024-03-30'),
(1, 4, '2024-03-18', '2024-04-02'),
(6, 15, '2024-04-01', '2024-04-15'),
(7, 22, '2024-04-03', '2024-04-18'),
(8, 9, '2024-04-05', '2024-04-20'),
(9, 6, '2024-04-08', '2024-04-23'),
(10, 16, '2024-04-10', '2024-04-25'),
(12, 20, '2024-04-12', '2024-04-27');

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

CREATE TABLE `evenements` (
  `id_event` int(11) NOT NULL,
  `mois_num` int(11) NOT NULL,
  `mois_name_ar` varchar(50) NOT NULL,
  `mois_name_fr` varchar(50) NOT NULL,
  `date_ar` varchar(100) NOT NULL,
  `date_fr` varchar(100) NOT NULL,
  `titre_ar` varchar(255) NOT NULL,
  `titre_fr` varchar(255) NOT NULL,
  `desc_ar` text NOT NULL,
  `desc_fr` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `evenements`
--

INSERT INTO `evenements` (`id_event`, `mois_num`, `mois_name_ar`, `mois_name_fr`, `date_ar`, `date_fr`, `titre_ar`, `titre_fr`, `desc_ar`, `desc_fr`) VALUES
(1, 1, 'جانفي', 'Janvier', '12 جانفي', '12 Janvier', 'رأس السنة الأمازيغية (يناير)', 'Yennayer (Nouvel An Amazigh)', 'معارض للصناعات التقليدية (فخار، حلي)، ورشات طبخ تقليدي، وعروض مسرحية وفلكلورية.', 'Expositions d\'artisanat, ateliers de cuisine traditionnelle, et spectacles folkloriques.'),
(2, 1, 'جانفي', 'Janvier', '25 جانفي', '25 Janvier', 'معرض الكتاب الشتوي', 'Foire d\'Hiver du Livre', 'معرض محلي يضم أحدث الإصدارات الأدبية مع جلسات بيع بالتوقيع.', 'Foire locale présentant les dernières parutions avec des séances de dédicaces.'),
(3, 2, 'فيفري', 'Février', '18 فيفري', '18 Février', 'اليوم الوطني للشهيد', 'Journée Nationale du Chahid', 'ندوات تاريخية، معارض صور لشهداء منطقة الخروب، ومسابقات شعرية في حب الوطن.', 'Conférences historiques, expositions photos et concours de poésie.'),
(4, 3, 'مارس', 'Mars', '08 مارس', '08 Mars', 'عيد المرأة وحلول الربيع', 'Fête de la Femme & Printemps', 'تكريم النساء الفاعلات في المجتمع الخروبي، ورشات رسم للأطفال، ومعارض للزهور والأشغال اليدوية.', 'Hommage aux femmes actives, ateliers de dessin pour enfants et expositions florales.'),
(5, 3, 'مارس', 'Mars', '21 مارس', '21 Mars', 'اليوم العالمي للشعر', 'Journée Mondiale de la Poésie', 'أمسية شعرية بمشاركة شعراء محليين ومسابقات في الإلقاء.', 'Soirée poétique avec la participation de poètes locaux et concours de récitation.'),
(6, 4, 'أفريل', 'Avril', '16 أفريل', '16 Avril', 'يوم العلم', 'Journée du Savoir (Youm El Ilm)', 'مسابقات فكرية بين مدارس البلدية، معرض محلي للكتاب، ومحاضرات حول مسيرة العلامة عبد الحميد بن باديس.', 'Concours intellectuels, foire locale du livre et conférences sur Abdelhamid Ben Badis.'),
(7, 5, 'ماي', 'Mai', '19 ماي', '19 Mai', 'عيد الطالب', 'Fête de l\'Étudiant', 'أبواب مفتوحة للنوادي العلمية، منافسات في البرمجة والابتكار، وعروض مسرحية جامعية من تنشيط الشباب.', 'Portes ouvertes des clubs scientifiques, compétitions d\'innovation et théâtre universitaire.'),
(8, 6, 'جوان', 'Juin', '01 جوان', '01 Juin', 'عيد الطفولة واختتام الموسم', 'Fête de l\'Enfance', 'مهرجان بهلواني، توزيع الجوائز على المتفوقين في نوادي المركز، وعرض مسرحي خاص بالأطفال.', 'Festival de clowns, remise des prix aux lauréats des clubs et spectacles pour enfants.'),
(9, 7, 'جويلية', 'Juillet', '05 جويلية', '05 Juillet', 'عيد الاستقلال والشباب', 'Fête de l\'Indépendance', 'رفع العلم الوطني، استعراضات كشفية وفلكلورية، وحفلات أناشيد وطنية بساحة المركز الثقافي.', 'Levée des couleurs, parades scoutes et folkloriques, et chants patriotiques.'),
(10, 7, 'جويلية', 'Juillet', '15 جويلية', '15 Juillet', 'مخيم الشباب الصيفي', 'Camp d\'été pour les jeunes', 'نشاطات ترفيهية وتعليمية مخصصة للشباب خلال العطلة الصيفية.', 'Activités récréatives et éducatives dédiées aux jeunes pendant les vacances d\'été.'),
(11, 8, 'أوت', 'Août', '20 أوت', '20 Août', 'اليوم الوطني للمجاهد', 'Journée du Moudjahid', 'عرض أفلام وثائقية تاريخية، ولقاءات مفتوحة مع مجاهدين لسرد بطولات جيش التحرير الوطني للأجيال.', 'Projections de documentaires historiques et rencontres avec les Moudjahidine.'),
(12, 9, 'سبتمبر', 'Septembre', '08 سبتمبر', '08 Septembre', 'الدخول الثقافي ومهرجان القراءة', 'Rentrée Culturelle', 'حملات واسعة لتشجيع المطالعة، افتتاح التسجيلات السنوية في نوادي المركز، وورشات مجانية في فن الخط العربي.', 'Campagnes de lecture, ouverture des inscriptions aux clubs et ateliers de calligraphie.'),
(13, 10, 'أكتوبر', 'Octobre', '17 أكتوبر', '17 Octobre', 'اليوم الوطني للهجرة', 'Journée de l\'Émigration', 'معارض فنية تجسد نضال الجالية الجزائرية بالخارج، وندوات تاريخية حول أحداث 17 أكتوبر 1961 بباريس.', 'Expositions artistiques sur la diaspora et conférences sur le 17 Octobre 1961.'),
(14, 11, 'نوفمبر', 'Novembre', '01 نوفمبر', '01 Novembre', 'ذكرى اندلاع الثورة التحريرية', 'Déclenchement de la Révolution', 'أسبوع السينما الثورية، عروض مسرحية ملحمية للشباب، وجداريات فنية حية تجسد بطولات الثورة التحريرية.', 'Semaine du cinéma révolutionnaire, théâtre épique et fresques murales.'),
(15, 12, 'ديسمبر', 'Décembre', '18 ديسمبر', '18 Décembre', 'اليوم العالمي للغة العربية', 'Journée Mondiale de la Langue Arabe', 'مسابقات في الإملاء والخطابة، أمسيات شعرية فصيحة، ومعرض مصغر للكتاب العربي القديم والحديث.', 'Concours de dictée, soirées poétiques et mini-foire du livre arabe.');

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

CREATE TABLE `livres` (
  `id_livre` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(100) DEFAULT NULL,
  `langue` varchar(50) DEFAULT NULL,
  `annee_publication` int(11) DEFAULT NULL,
  `quantite_dispo` int(11) DEFAULT 1,
  `id_categorie` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`id_livre`, `titre`, `auteur`, `langue`, `annee_publication`, `quantite_dispo`, `id_categorie`) VALUES
(1, 'البؤساء', 'فيكتور هوجو', 'العربية', 1862, 5, 1),
(2, 'الخيميائي', 'باولو كويلو', 'العربية', 1988, 3, 1),
(3, 'Le Petit Prince', 'Antoine de Saint-Exupéry', 'Français', 1943, 4, 1),
(4, 'نجمة', 'كاتب ياسين', 'العربية', 1956, 3, 1),
(5, 'L\'Étranger', 'Albert Camus', 'Français', 1942, 6, 1),
(6, 'مقدمة ابن خلدون', 'ابن خلدون', 'العربية', 1377, 2, 2),
(7, 'تاريخ الجزائر الثقافي', 'أبو القاسم سعد الله', 'العربية', 1998, 6, 2),
(8, 'الحركة الوطنية الجزائرية', 'أبو القاسم سعد الله', 'العربية', 1992, 4, 2),
(9, 'Une brève histoire du temps', 'Stephen Hawking', 'Français', 1988, 2, 3),
(10, 'الكون', 'كارل ساغان', 'العربية', 1980, 1, 3),
(11, 'أساسيات الفيزياء', 'فريدريك بوش', 'العربية', 2005, 3, 3),
(12, 'الرحيق المختوم', 'صفي الرحمن المباركفوري', 'العربية', 1976, 10, 4),
(13, 'تفسير ابن كثير', 'ابن كثير', 'العربية', 1370, 2, 4),
(14, 'لا تحزن', 'عائض القرني', 'العربية', 2003, 8, 4),
(15, 'العادات السبع للناس الأكثر فعالية', 'ستيفن كوفي', 'العربية', 1989, 4, 5),
(16, 'Père riche, père pauvre', 'Robert Kiyosaki', 'Français', 1997, 5, 5),
(17, 'فن اللامبالاة', 'مارك مانسون', 'العربية', 2016, 7, 5),
(18, 'شروط النهضة', 'مالك بن نبي', 'العربية', 1949, 4, 6),
(19, 'هكذا تكلم زرادشت', 'فريدريك نيتشه', 'العربية', 1883, 2, 6),
(20, 'مغامرات تان تان', 'هيرجيه', 'العربية', 1929, 5, 7),
(21, 'حكايات لافونتين', 'جان دي لافونتين', 'العربية', 1668, 4, 7),
(22, 'Harry Potter à l\'école des sorciers', 'J.K. Rowling', 'Français', 1997, 6, 7),
(23, 'قصة الفن', 'إرنست غومبريتش', 'العربية', 1950, 2, 8),
(24, 'تاريخ الفن الإسلامي', 'ألكسندر بابادوبولو', 'العربية', 1976, 1, 8),
(25, 'الجماليات', 'هيغل', 'العربية', 1835, 2, 8);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`) VALUES
(1, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'مدير المركز');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adherents`
--
ALTER TABLE `adherents`
  ADD PRIMARY KEY (`id_adherent`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `emprunts`
--
ALTER TABLE `emprunts`
  ADD PRIMARY KEY (`id_adherent`,`id_livre`),
  ADD KEY `fk_livre` (`id_livre`);

--
-- Index pour la table `evenements`
--
ALTER TABLE `evenements`
  ADD PRIMARY KEY (`id_event`);

--
-- Index pour la table `livres`
--
ALTER TABLE `livres`
  ADD PRIMARY KEY (`id_livre`),
  ADD KEY `fk_categorie` (`id_categorie`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adherents`
--
ALTER TABLE `adherents`
  MODIFY `id_adherent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `evenements`
--
ALTER TABLE `evenements`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `livres`
--
ALTER TABLE `livres`
  MODIFY `id_livre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
