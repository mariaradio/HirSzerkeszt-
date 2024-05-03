-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Máj 03. 12:50
-- Kiszolgáló verziója: 10.4.27-MariaDB
-- PHP verzió: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `test`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felolvasas`
--

CREATE TABLE `felolvasas` (
  `hir` bigint(20) UNSIGNED NOT NULL,
  `felolvasas_datuma` datetime NOT NULL DEFAULT '2024-05-03 10:31:00',
  `felolvaso` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `felolvasas`
--

INSERT INTO `felolvasas` (`hir`, `felolvasas_datuma`, `felolvaso`, `created_at`, `updated_at`) VALUES
(3, '2007-09-30 09:19:41', 3, NULL, NULL),
(4, '1990-01-13 23:16:51', 7, NULL, NULL),
(5, '1989-08-06 20:15:27', 11, NULL, NULL),
(5, '2015-04-05 07:08:07', 8, NULL, NULL),
(6, '1995-08-27 16:13:11', 7, NULL, NULL),
(7, '2009-10-13 06:31:35', 3, NULL, NULL),
(9, '1971-09-08 12:33:56', 6, NULL, NULL),
(9, '1983-10-05 03:14:08', 5, NULL, NULL),
(9, '2003-11-28 00:14:32', 3, NULL, NULL),
(10, '1975-11-04 18:56:52', 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `hirs`
--

CREATE TABLE `hirs` (
  `hir_id` bigint(20) UNSIGNED NOT NULL,
  `szerkeszto` bigint(20) UNSIGNED NOT NULL,
  `cim` varchar(255) NOT NULL,
  `tartalom` varchar(6000) NOT NULL,
  `letrehozas` datetime NOT NULL,
  `utolso_szerkesztes` datetime NOT NULL,
  `felolvasasok_szama` int(11) NOT NULL DEFAULT 0,
  `ervenyesseg` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `hirs`
--

INSERT INTO `hirs` (`hir_id`, `szerkeszto`, `cim`, `tartalom`, `letrehozas`, `utolso_szerkesztes`, `felolvasasok_szama`, `ervenyesseg`, `created_at`, `updated_at`) VALUES
(1, 5, 'Dr.', 'Ab delectus quod voluptatem animi praesentium iure. Perspiciatis ducimus consectetur pariatur quo. Similique magnam deleniti earum quasi dolores.', '2014-02-02 22:19:25', '2015-12-10 03:36:30', 72592068, '2022-05-28 07:53:09', '2024-05-03 08:31:00', '2024-05-03 08:31:00'),
(2, 1, 'Ms.', 'Perferendis vel quo delectus dolorum accusamus beatae. Tenetur numquam tempora quo molestiae. Laboriosam nam rerum aperiam quo dicta blanditiis est.', '1997-09-27 23:07:09', '2005-06-07 12:16:16', 3, '2008-02-24 23:32:21', '2024-05-03 08:31:00', '2024-05-03 08:31:00'),
(3, 1, 'Prof.', 'Nesciunt et tenetur provident molestiae eius. Magnam incidunt aliquam dignissimos ut culpa. Enim voluptas quisquam et sunt nisi accusantium. Quae quos temporibus odit rerum nam eius ea.', '1987-11-24 12:00:40', '1975-04-22 02:42:46', 81101, '2004-01-30 23:19:24', '2024-05-03 08:31:00', '2024-05-03 08:31:00'),
(4, 2, 'Miss', 'Deleniti et quidem in quas. Officia unde delectus repellendus iste iure odit aut.', '1974-08-27 22:56:59', '1989-01-19 08:20:12', 442389, '1982-06-02 22:35:02', '2024-05-03 08:31:00', '2024-05-03 08:31:00'),
(5, 10, 'Dr.', 'Ut illo nostrum qui qui. Velit nemo non dolores repellendus doloremque atque. Temporibus voluptas iusto sint numquam maiores. Quas aut vel dolor quidem tenetur perferendis nobis ex.', '1998-08-27 13:21:51', '2021-06-28 18:05:20', 10, '1975-11-09 15:00:08', '2024-05-03 08:31:00', '2024-05-03 08:31:00'),
(6, 11, 'Dr.', 'Nemo amet qui sed id excepturi dolorum aut. Nesciunt minus perferendis ab omnis molestiae accusamus expedita. Optio facilis mollitia est et et unde. Ut culpa consequatur et debitis.', '1994-12-06 00:25:51', '1989-05-04 16:20:19', 459668, '2021-10-24 04:44:52', '2024-05-03 08:31:00', '2024-05-03 08:31:00'),
(7, 6, 'Dr.', 'Tempora omnis illum quaerat repellat qui facilis. Sit illo voluptatem sit ad. Facilis neque ipsa enim sit at.', '2003-07-22 08:17:11', '2007-01-05 06:22:01', 350, '1985-12-03 05:35:32', '2024-05-03 08:31:00', '2024-05-03 08:31:00'),
(8, 8, 'Ms.', 'Modi iusto vel est et non aut minus in. Aut temporibus id asperiores autem. Dolores nesciunt dolorem quisquam cum. Delectus dolores nobis nam est quia tenetur.', '2019-06-11 01:16:29', '1995-06-15 15:08:05', 95697931, '2012-04-22 21:50:17', '2024-05-03 08:31:00', '2024-05-03 08:31:00'),
(9, 2, 'Dr.', 'Ex voluptas qui voluptatem a reiciendis perspiciatis nam non. Vero nemo nam praesentium aut et. Aut asperiores fugit accusantium minus laudantium quidem quae. Fuga qui harum quas optio.', '1983-02-01 00:24:22', '1975-12-21 05:42:54', 375, '1989-02-24 11:05:12', '2024-05-03 08:31:00', '2024-05-03 08:31:00'),
(10, 11, 'Ms.', 'Dolor culpa aliquam et dolores debitis perferendis. Numquam est molestias eos officia quia. Dignissimos assumenda laborum incidunt.', '1979-07-19 12:22:19', '2010-12-10 06:13:10', 769198130, '1984-01-16 22:19:48', '2024-05-03 08:31:00', '2024-05-03 08:31:00'),
(11, 1, 'sesdgsd', 'vsdfsfsd', '2024-05-03 10:31:57', '2024-05-03 10:31:57', 0, '2024-06-03 10:31:57', '2024-05-03 08:31:57', '2024-05-03 08:31:57');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `hir_archivs`
--

CREATE TABLE `hir_archivs` (
  `hir` bigint(20) UNSIGNED NOT NULL,
  `csere` datetime NOT NULL,
  `ervenyesseg` datetime NOT NULL,
  `cim` varchar(255) NOT NULL,
  `tartalom` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `hir_archivs`
--

INSERT INTO `hir_archivs` (`hir`, `csere`, `ervenyesseg`, `cim`, `tartalom`, `created_at`, `updated_at`) VALUES
(1, '1996-03-07 20:18:09', '1998-06-20 03:21:19', 'Mr.', 'Qui veritatis maxime consequatur sed consequuntur est et. Quas voluptatem quas dicta voluptatibus. Laboriosam officia eaque et laborum quibusdam. Officiis quas eaque ut voluptatem nihil nihil.', '2024-05-03 08:31:00', '2024-05-03 08:31:00'),
(2, '1986-04-17 07:48:51', '1973-02-21 14:23:58', 'Prof.', 'Officia in rem eos quas voluptas vel in. Itaque non distinctio dolores. Et id exercitationem iusto est nemo.', '2024-05-03 08:31:00', '2024-05-03 08:31:00'),
(3, '2003-11-10 10:12:05', '1975-01-21 09:14:31', 'Miss', 'Delectus rerum libero esse eum enim repellendus. Eum aut et illum error quia illum dolores et.', '2024-05-03 08:31:00', '2024-05-03 08:31:00'),
(3, '2015-11-16 03:02:17', '2023-05-15 13:33:21', 'Mr.', 'Ut nemo ipsam quia est soluta in odio. Maiores et harum quidem ipsa. Facilis voluptatem recusandae architecto enim est molestiae porro. Praesentium eligendi cupiditate dolores dolorem.', '2024-05-03 08:31:00', '2024-05-03 08:31:00'),
(3, '2024-01-11 14:46:17', '1999-06-08 08:58:23', 'Dr.', 'Quam voluptatem in nostrum repellendus. Autem dolor consectetur odio velit ut nisi. Qui suscipit ad assumenda quidem dolorem qui ea.', '2024-05-03 08:31:00', '2024-05-03 08:31:00'),
(9, '1970-04-02 00:45:01', '1984-08-13 17:46:26', 'Prof.', 'Reprehenderit sit quo officiis harum non officiis minima ea. Qui dolor eveniet accusantium non quia perspiciatis. Quod ducimus inventore ad ea. Minus autem laudantium autem officiis et.', '2024-05-03 08:31:00', '2024-05-03 08:31:00'),
(9, '1970-12-23 02:50:19', '1982-03-17 10:46:06', 'Prof.', 'Ipsa magnam maxime iusto facere aut quis deleniti ipsa. Illum consequatur voluptas in saepe nam. Placeat accusamus dolores ducimus eos incidunt aspernatur. Officiis voluptas ex voluptatibus odio.', '2024-05-03 08:31:00', '2024-05-03 08:31:00'),
(9, '1971-07-05 18:01:35', '1973-08-03 20:37:25', 'Prof.', 'Sit labore molestiae dolores est. Sequi excepturi fuga eum laboriosam. Quo autem velit nisi sit rerum.', '2024-05-03 08:31:00', '2024-05-03 08:31:00'),
(9, '2011-02-25 04:50:27', '1983-06-27 08:42:07', 'Prof.', 'Molestias quo consequatur iste repellat. Necessitatibus aliquid unde eos incidunt quibusdam qui sit. Ipsum alias qui amet hic.', '2024-05-03 08:31:00', '2024-05-03 08:31:00'),
(10, '2018-02-13 14:28:11', '2019-10-11 02:20:16', 'Dr.', 'Amet commodi porro unde dolorem. Et tempore consequatur voluptatem minima rerum. Perspiciatis dolorem officiis eius suscipit.', '2024-05-03 08:31:00', '2024-05-03 08:31:00');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `korlatoks`
--

CREATE TABLE `korlatoks` (
  `beallitas_kezdete` datetime NOT NULL,
  `admin` int(11) NOT NULL,
  `cim_hossza` int(11) NOT NULL,
  `tartalom_hossza` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `korlatoks`
--

INSERT INTO `korlatoks` (`beallitas_kezdete`, `admin`, `cim_hossza`, `tartalom_hossza`, `created_at`, `updated_at`) VALUES
('1978-02-01 00:00:00', 6, 2, 7, '2024-05-03 08:31:00', '2024-05-03 08:31:00'),
('1979-12-09 00:00:00', 2, 6, 1, '2024-05-03 08:31:00', '2024-05-03 08:31:00'),
('1981-05-04 00:00:00', 1, 2, 8, '2024-05-03 08:31:00', '2024-05-03 08:31:00'),
('1987-10-25 00:00:00', 2, 6, 0, '2024-05-03 08:31:00', '2024-05-03 08:31:00'),
('1991-09-05 00:00:00', 8, 8, 9, '2024-05-03 08:31:00', '2024-05-03 08:31:00'),
('1993-03-14 00:00:00', 2, 9, 9, '2024-05-03 08:31:00', '2024-05-03 08:31:00'),
('1993-12-16 00:00:00', 5, 9, 7, '2024-05-03 08:31:00', '2024-05-03 08:31:00'),
('2009-04-22 00:00:00', 4, 3, 8, '2024-05-03 08:31:00', '2024-05-03 08:31:00'),
('2010-09-16 00:00:00', 0, 4, 0, '2024-05-03 08:31:00', '2024-05-03 08:31:00'),
('2017-06-27 00:00:00', 8, 7, 8, '2024-05-03 08:31:00', '2024-05-03 08:31:00');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_06_100139_create_hirs_table', 1),
(6, '2024_01_12_121719_create_korlatoks_table', 1),
(7, '2024_01_18_100547_create_hir_archivs_table', 1),
(8, '2024_01_19_104526_create_felolvasas_table', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `felhasznalo_id` bigint(20) UNSIGNED NOT NULL,
  `felhasznalo_nev` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `szerkeszto` tinyint(1) NOT NULL,
  `olvaso` tinyint(1) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`felhasznalo_id`, `felhasznalo_nev`, `password`, `email`, `admin`, `szerkeszto`, `olvaso`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'DK', '$2y$10$y2zQEuKELLBqKgKy4di8beNEvWVMPw.4kKsbgzgJcrjytmPCNGzJG', 'sd@gmail.com', 1, 1, 1, NULL, NULL, NULL),
(2, 'Elenor Olson', '$2y$10$eCMkt4hEAotJbR5UVEkzGOFKkaO.iyGa7ZWw1fSwNWs9kpHKzj9ES', 'ngreen@effertz.info', 1, 0, 1, 'GqtJ05DCBI', NULL, NULL),
(3, 'Maurice Ratke', '$2y$10$azJ4gMBh7/NjEwJCUKtH6.Cw/BA4L62iCASX7Z/ybH2Ba4kfW5UBq', 'elyssa.douglas@hotmail.com', 0, 1, 1, 'd91DOZPIis', NULL, NULL),
(4, 'Rosanna McKenzie', '$2y$10$1LytJIAbj2lDpeUjyUv7zuy3DFh90TVM02IiiyD54yebaZPg27dDu', 'owiza@hotmail.com', 1, 0, 1, 'CtIFLiLi1F', NULL, NULL),
(5, 'Amber Purdy', '$2y$10$zDjDMA1n9D1N1Urj02qPuedpK/N4/TRPzj5sO3/8ZZHqqjpA.Fyfq', 'inolan@ohara.info', 1, 1, 1, 'CWZwXZJxjx', NULL, NULL),
(6, 'Jammie Bradtke', '$2y$10$9nkLV7CTpWX7XWvRYhQLBu08r2/HmkMuQOdX2hedhQ4h1q5yIcgh.', 'berge.frederic@gmail.com', 0, 1, 1, 'u6PK7mPS82', NULL, NULL),
(7, 'Miss Kelly Heller DDS', '$2y$10$CrML.q1N6mPvh4kt5HO/VOjeJIMVh3D.kCM53wuiacprYSG0XZDUW', 'evelyn.willms@senger.com', 0, 0, 0, 'Sny4DofHRX', NULL, NULL),
(8, 'Rosalia Denesik', '$2y$10$mDR5q0s1paDk.jwbkPL8pu226N13iNBfpQSge7anAe.OBUrl2sOtm', 'konopelski.golda@hotmail.com', 1, 0, 1, 'gkddqEnqqO', NULL, NULL),
(9, 'Emmie Okuneva', '$2y$10$pVYBTU0QndQUH9BCQ4y5lODw5Sq1D/AHmA.Yq.Uh0GNYhLirN2LvC', 'daniela.adams@witting.com', 0, 1, 1, 'V4sbupMSfy', NULL, NULL),
(10, 'Dr. Lindsey Morissette V', '$2y$10$MWYyRaf9hHD50OB9w0OVTOhzevlUXA8eaRxXOP.2mNfuIgQ0D/zB.', 'aliyah05@hotmail.com', 0, 0, 0, 'R0Zkgn9fQv', NULL, NULL),
(11, 'Patsy Lowe', '$2y$10$OO8MfbSluEXFeZ2N1p5wYeV9RQyqifyx78fjQZk1nyiIyHB0YXbay', 'xbins@quitzon.com', 1, 0, 0, 'UkvmPyd00y', NULL, NULL);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- A tábla indexei `felolvasas`
--
ALTER TABLE `felolvasas`
  ADD PRIMARY KEY (`hir`,`felolvasas_datuma`),
  ADD KEY `felolvasas_felolvaso_foreign` (`felolvaso`);

--
-- A tábla indexei `hirs`
--
ALTER TABLE `hirs`
  ADD PRIMARY KEY (`hir_id`),
  ADD KEY `hirs_szerkeszto_foreign` (`szerkeszto`);

--
-- A tábla indexei `hir_archivs`
--
ALTER TABLE `hir_archivs`
  ADD PRIMARY KEY (`hir`,`csere`);

--
-- A tábla indexei `korlatoks`
--
ALTER TABLE `korlatoks`
  ADD PRIMARY KEY (`beallitas_kezdete`);

--
-- A tábla indexei `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- A tábla indexei `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`felhasznalo_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `hirs`
--
ALTER TABLE `hirs`
  MODIFY `hir_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT a táblához `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT a táblához `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `felhasznalo_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `felolvasas`
--
ALTER TABLE `felolvasas`
  ADD CONSTRAINT `felolvasas_felolvaso_foreign` FOREIGN KEY (`felolvaso`) REFERENCES `users` (`felhasznalo_id`),
  ADD CONSTRAINT `felolvasas_hir_foreign` FOREIGN KEY (`hir`) REFERENCES `hirs` (`hir_id`);

--
-- Megkötések a táblához `hirs`
--
ALTER TABLE `hirs`
  ADD CONSTRAINT `hirs_szerkeszto_foreign` FOREIGN KEY (`szerkeszto`) REFERENCES `users` (`felhasznalo_id`);

--
-- Megkötések a táblához `hir_archivs`
--
ALTER TABLE `hir_archivs`
  ADD CONSTRAINT `hir_archivs_hir_foreign` FOREIGN KEY (`hir`) REFERENCES `hirs` (`hir_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
