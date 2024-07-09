-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 09, 2024 at 07:57 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laregie`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint UNSIGNED NOT NULL,
  `article_nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `segment_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `article_nom`, `description`, `segment_id`, `created_at`, `updated_at`) VALUES
(1, 'article-1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla culpa quibusdam, consequatur pariatur reprehenderit quia neque ea sapiente similique aspernatur quidem doloribus aliquid esse deserunt incidunt voluptates architecto sint saepe.\n            Iure tempora dolor placeat quam deleniti vero neque ipsum exercitationem quaerat dolorum necessitatibus optio doloribus error ratione, maxime ex repellat ullam ipsa, blanditiis labore dignissimos, veritatis natus. Facere, ullam quod!\n            Doloribus iusto rerum, accusamus id saepe laboriosam architecto aut impedit consequuntur consectetur fugit in ipsa quae magni est deleniti nobis consequatur veniam ad quam vel eum! Nulla quisquam debitis velit?\n            Repellat sint deleniti consectetur laudantium temporibus sapiente, dolores minus labore libero voluptatum, obcaecati quis sequi culpa! Culpa sunt dolores debitis, ad nobis magnam aut corporis dolore at. Expedita, temporibus ipsam!', 2, '2024-07-01 11:21:13', '2024-07-01 11:21:13'),
(2, 'article-2', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos beatae quibusdam odit, magni reprehenderit dolor, repellendus qui labore asperiores perspiciatis voluptates vitae quam voluptatum delectus molestiae obcaecati minima esse excepturi.\n            In consequuntur nam incidunt facere reiciendis ducimus, magni, optio consequatur ullam maiores adipisci? Nisi quibusdam eius officiis officia, explicabo, cum illo, dolores porro modi voluptate hic labore! Hic, iste laboriosam.\n            At, voluptas culpa. Facilis atque fuga asperiores obcaecati necessitatibus veniam dolorem, dicta neque corrupti illum. Odio, eos. Et dignissimos, ut nisi sequi amet nostrum architecto nulla exercitationem asperiores eligendi minus?\n            Autem aut, sapiente quasi velit cupiditate numquam! Dolores, quo veniam. Quasi labore repellendus maiores rerum molestias magnam porro beatae necessitatibus. Adipisci, officia dolorum aspernatur enim exercitationem unde doloribus cupiditate veritatis?', 2, '2024-07-07 08:51:25', '2024-07-07 08:51:25'),
(3, 'article-3', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nisi atque ex, laboriosam nemo molestias porro ab provident vero fuga perferendis totam ad numquam aliquam tempora voluptates beatae iste suscipit quidem.\n            Neque atque reprehenderit dolores. Deleniti nostrum eos commodi rem mollitia nemo adipisci, ad eaque tempore culpa consequatur dolor non natus sequi error earum fugiat impedit amet minus nihil sit eum.\n            Expedita praesentium totam ipsa necessitatibus enim amet officia blanditiis, repellat illum! Dignissimos sequi unde voluptatum repellat aliquid quaerat at accusantium facilis voluptate eaque sed, pariatur exercitationem quod labore odit in.\n            Exercitationem provident voluptatibus natus laudantium error suscipit voluptatum. Cum molestiae voluptates dolor ratione facilis. Sunt at explicabo, unde alias quis consequuntur architecto eos vel. Minus ab ratione quam dolorem sunt.', 2, '2024-07-07 09:21:11', '2024-07-07 09:21:11'),
(4, 'article-4', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos optio temporibus harum sapiente sunt obcaecati repudiandae incidunt aperiam tenetur reprehenderit fugit dolores voluptates, quis vel aspernatur quod quas, minus molestiae?\n            Quod, cum veniam? Temporibus consequuntur aliquid excepturi doloribus a iusto hic maiores dicta autem totam distinctio veniam, repudiandae perspiciatis saepe ea similique vitae veritatis corporis et dolorum corrupti quae eligendi?\n            Eos nam rem labore voluptatum. Maxime beatae nostrum ipsum ea mollitia unde, quo impedit autem odio. Blanditiis harum esse incidunt delectus modi eius eum eaque voluptatem amet accusamus. Cupiditate, maiores!\n            Sit nobis, natus molestiae labore eius aut praesentium officia explicabo quaerat iusto soluta consequuntur qui accusantium recusandae deserunt, incidunt ea in sed corrupti magnam architecto, eveniet cum repellendus. Soluta, sit?', 3, '2024-07-07 09:47:23', '2024-07-07 09:58:58');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `familles`
--

CREATE TABLE `familles` (
  `id` bigint UNSIGNED NOT NULL,
  `famille_nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `groupe_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `familles`
--

INSERT INTO `familles` (`id`, `famille_nom`, `groupe_id`, `created_at`, `updated_at`) VALUES
(1, 'Famille-1', 1, '2024-07-01 11:14:09', '2024-07-01 11:14:09'),
(2, 'famille-2', 2, '2024-07-01 11:24:43', '2024-07-07 08:52:17');

-- --------------------------------------------------------

--
-- Table structure for table `groupes`
--

CREATE TABLE `groupes` (
  `id` bigint UNSIGNED NOT NULL,
  `groupe_nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metier_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groupes`
--

INSERT INTO `groupes` (`id`, `groupe_nom`, `metier_id`, `created_at`, `updated_at`) VALUES
(1, 'groupe-1', 1, '2024-07-01 11:14:01', '2024-07-01 11:14:01'),
(2, 'groupe-2', 1, '2024-07-07 08:51:41', '2024-07-07 08:51:41');

-- --------------------------------------------------------

--
-- Table structure for table `metiers`
--

CREATE TABLE `metiers` (
  `id` bigint UNSIGNED NOT NULL,
  `metier_nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metiers`
--

INSERT INTO `metiers` (`id`, `metier_nom`) VALUES
(1, 'Eau');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_05_24_180840_create_profiles_table', 1),
(2, '2013_05_24_181025_create_metiers_table', 1),
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2024_05_27_112903_create_groupes_table', 1),
(8, '2024_05_27_112916_create_familles_table', 1),
(9, '2024_05_27_112923_create_segments_table', 1),
(10, '2024_05_27_112933_create_articles_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint UNSIGNED NOT NULL,
  `profile_nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `profile_nom`) VALUES
(1, 'Observateur'),
(2, 'Operateur'),
(3, 'Administrateur');

-- --------------------------------------------------------

--
-- Table structure for table `segments`
--

CREATE TABLE `segments` (
  `id` bigint UNSIGNED NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `famille_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `segments`
--

INSERT INTO `segments` (`id`, `libelle`, `famille_id`, `created_at`, `updated_at`) VALUES
(2, 'segment-1', 2, '2024-07-07 08:30:27', '2024-07-07 08:30:27'),
(3, 'segments-2', 1, '2024-07-07 08:57:40', '2024-07-07 10:09:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_id` bigint UNSIGNED NOT NULL,
  `metier_id` bigint UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `email_verified_at`, `password`, `profile_id`, `metier_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ali', 'Mohamed', 'AliMohamed@yahoo.com', NULL, '$2y$12$oPxVQGsKNhaRWXRk0dc1z.CptwiW0sCvbU274CVvyzMEOhhZMFHEW', 1, 1, NULL, '2024-07-01 11:12:28', '2024-07-01 11:12:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_segment_id_foreign` (`segment_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `familles`
--
ALTER TABLE `familles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `familles_groupe_id_foreign` (`groupe_id`);

--
-- Indexes for table `groupes`
--
ALTER TABLE `groupes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groupes_metier_id_foreign` (`metier_id`);

--
-- Indexes for table `metiers`
--
ALTER TABLE `metiers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `segments`
--
ALTER TABLE `segments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `segments_famille_id_foreign` (`famille_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_profile_id_foreign` (`profile_id`),
  ADD KEY `users_metier_id_foreign` (`metier_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `familles`
--
ALTER TABLE `familles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `groupes`
--
ALTER TABLE `groupes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `metiers`
--
ALTER TABLE `metiers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `segments`
--
ALTER TABLE `segments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_segment_id_foreign` FOREIGN KEY (`segment_id`) REFERENCES `segments` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `familles`
--
ALTER TABLE `familles`
  ADD CONSTRAINT `familles_groupe_id_foreign` FOREIGN KEY (`groupe_id`) REFERENCES `groupes` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `groupes`
--
ALTER TABLE `groupes`
  ADD CONSTRAINT `groupes_metier_id_foreign` FOREIGN KEY (`metier_id`) REFERENCES `metiers` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `segments`
--
ALTER TABLE `segments`
  ADD CONSTRAINT `segments_famille_id_foreign` FOREIGN KEY (`famille_id`) REFERENCES `familles` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_metier_id_foreign` FOREIGN KEY (`metier_id`) REFERENCES `metiers` (`id`),
  ADD CONSTRAINT `users_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
