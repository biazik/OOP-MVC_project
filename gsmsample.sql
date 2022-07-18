-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 18 Lip 2022, 16:08
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `gsmsample`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cash_status`
--

CREATE TABLE `cash_status` (
  `shop_id` tinyint(4) NOT NULL,
  `cash` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `cash_status`
--

INSERT INTO `cash_status` (`shop_id`, `cash`) VALUES
(1, 100),
(1, 100);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `devices`
--

CREATE TABLE `devices` (
  `id` int(11) NOT NULL,
  `shop_id` tinyint(4) NOT NULL,
  `device_id` tinyint(4) NOT NULL,
  `name` text NOT NULL,
  `buy_price` smallint(6) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `device_categories`
--

CREATE TABLE `device_categories` (
  `id` smallint(6) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL DEFAULT 'Brak dodatkowego opisu.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `device_categories`
--

INSERT INTO `device_categories` (`id`, `name`, `description`) VALUES
(1, 'Telefon', 'Brak dodatkowego opisu.'),
(2, 'Laptop', 'Brak dodatkowego opisu.'),
(3, 'Inne', 'Inne urządzenie bez przypisanej kategorii.'),
(4, 'Konsola', 'Brak dodatkowego opisu.');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `shop_id` tinyint(4) NOT NULL,
  `log_id` tinyint(4) NOT NULL,
  `user_id` smallint(6) NOT NULL,
  `description` text NOT NULL,
  `refund_price` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logs_categories`
--

CREATE TABLE `logs_categories` (
  `id` tinyint(4) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `logs_categories`
--

INSERT INTO `logs_categories` (`id`, `name`, `description`) VALUES
(1, 'Insert', 'Użytkownik dodał do bazy danych:'),
(2, 'Update', 'Użytkownik zaktualizował rekord w bazie danych'),
(3, 'Delete', 'Użytkownik usunął rekord w bazie danych'),
(4, 'Refund', 'Użytkownik zwrócił pieniądze klientowi');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `payments`
--

CREATE TABLE `payments` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `payments`
--

INSERT INTO `payments` (`id`, `name`, `description`) VALUES
(1, 'Gotówka', 'Zapłata gotówką'),
(2, 'Karta', 'Zapłata kartą');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `repairs`
--

CREATE TABLE `repairs` (
  `id` int(11) NOT NULL,
  `shop_id` tinyint(4) NOT NULL,
  `status_id` tinyint(4) NOT NULL DEFAULT 1,
  `device_id` tinyint(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL DEFAULT 'Brak',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `repair_status`
--

CREATE TABLE `repair_status` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `repair_status`
--

INSERT INTO `repair_status` (`id`, `name`, `description`) VALUES
(1, 'W naprawie', 'Urządzenie zostało przyjęte do naprawy'),
(2, 'Po naprawie', 'Urządzenie zostało naprawione');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `roles`
--

CREATE TABLE `roles` (
  `id` tinyint(4) NOT NULL,
  `role` varchar(20) NOT NULL,
  `description` text NOT NULL DEFAULT 'Brak opisu roli.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `roles`
--

INSERT INTO `roles` (`id`, `role`, `description`) VALUES
(1, 'User', 'Podstawowy użytkownik systemu'),
(2, 'Admin', 'Administrator systemu'),
(4, 'Blocked', 'Użytkownik zablokowany');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `shop_id` tinyint(4) NOT NULL,
  `category_id` smallint(6) NOT NULL,
  `payment_id` tinyint(4) NOT NULL,
  `description` text NOT NULL,
  `buy_price` smallint(6) NOT NULL,
  `sell_price` smallint(6) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sale_categories`
--

CREATE TABLE `sale_categories` (
  `id` smallint(6) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL DEFAULT 'Brak dodatkowego opisu.',
  `buy_price` smallint(6) NOT NULL DEFAULT 0,
  `sell_price` smallint(6) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `sale_categories`
--

INSERT INTO `sale_categories` (`id`, `name`, `description`, `buy_price`, `sell_price`) VALUES
(1, 'Etui zwykłe', 'Np. jelly case', 20, 35),
(2, 'Etui Spigen', 'Brak dodatkowego opisu.', 47, 80),
(3, 'Szkło zwykłe', 'Brak dodatkowego opisu.', 3, 20),
(4, 'Folia hydrożelowa', 'Brak dodatkowego opisu.', 12, 70),
(5, 'Inne', 'Opisz co sprzedałeś', 0, 0),
(6, 'Uchwyt samochodowy', 'Brak dodatkowego opisu.', 15, 40),
(7, 'Ładowarka Typ C', 'Brak dodatkowego opisu.', 15, 40),
(8, 'Ładowarka Micro USB', 'Brak dodatkowego opisu.', 15, 40),
(9, 'Ładowarka iPhone', 'Brak dodatkowego opisu.', 15, 40),
(10, 'Ładowarka Ori iPhone 5W', 'Brak dodatkowego opisu.', 30, 70),
(11, 'Ładowarka iPhone 20W', 'Brak dodatkowego opisu.', 40, 80),
(12, 'Kabel 1M', 'Brak dodatkowego opisu.', 12, 35),
(13, 'Kabel 2M', 'Brak dodatkowego opisu.', 15, 40),
(14, 'Etui Silicon Case', 'Brak dodatkowego opisu.', 20, 80),
(15, 'Kostka Baseus Typ C', 'Brak dodatkowego opisu.', 30, 60),
(16, 'Etui Karl / Guess', 'Brak dodatkowego opisu.', 80, 150),
(17, 'Ładowarka Ori Samsung', 'Brak dodatkowego opisu.', 30, 70),
(18, 'Pendrive 16GB', 'Brak dodatkowego opisu.', 12, 30),
(19, 'Pendrive 32GB', 'Brak dodatkowego opisu.', 15, 50),
(20, 'Pendrive 64GB', 'Brak dodatkowego opisu.', 30, 80),
(21, 'Karta pamięci 16GB', 'Brak dodatkowego opisu.', 12, 30),
(23, 'Karta pamięci 32GB', 'Brak dodatkowego opisu.', 15, 50),
(24, 'Karta pamięci 64GB', 'Brak dodatkowego opisu.', 30, 80),
(25, 'Słuchawki plast. pudełko', 'Brak dodatkowego opisu.', 10, 30),
(26, 'Słuchawki pom. pudełko', 'Brak dodatkowego opisu.', 15, 40),
(27, 'Słuchawki AKG', 'Brak dodatkowego opisu.', 30, 70),
(28, 'Słuchawki bezp. Baseus', 'Brak dodatkowego opisu.', 100, 160),
(29, 'Etui Vennus', 'Brak dodatkowego opisu.', 15, 40),
(30, 'Przejściówka SIM', 'Brak dodatkowego opisu.', 1, 5),
(31, 'Serwis', 'Brak dodatkowego opisu.', 0, 0),
(33, 'Testowa', 'Tak właściwie to nie ma tu opisu', 100, 180),
(34, 'Etui brokatowe', '', 5, 20),
(35, 'Uchwyt z ładowaniem indukcyjnym', '', 100, 130);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `shops`
--

CREATE TABLE `shops` (
  `id` tinyint(4) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `phone_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `shops`
--

INSERT INTO `shops` (`id`, `name`, `address`, `phone_number`) VALUES
(1, 'Sample Shop', 'Example street', '00000000000');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` smallint(6) NOT NULL,
  `role_id` tinyint(4) NOT NULL,
  `shop_id` tinyint(4) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(150) NOT NULL COMMENT '150 because of Argon2id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `role_id`, `shop_id`, `username`, `password`) VALUES
(17, 2, 1, 'Admin1', '$argon2id$v=19$m=65536,t=4,p=1$LkZhTHhMbkZxLjVLeVhsZQ$2xkuUC9Pb2PivO9EkNza+uX58cajz1oXdaPHkSZVuXc');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `device_categories`
--
ALTER TABLE `device_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `logs_categories`
--
ALTER TABLE `logs_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `repairs`
--
ALTER TABLE `repairs`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `repair_status`
--
ALTER TABLE `repair_status`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `sale_categories`
--
ALTER TABLE `sale_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `device_categories`
--
ALTER TABLE `device_categories`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `logs_categories`
--
ALTER TABLE `logs_categories`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `payments`
--
ALTER TABLE `payments`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `repairs`
--
ALTER TABLE `repairs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `repair_status`
--
ALTER TABLE `repair_status`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `roles`
--
ALTER TABLE `roles`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `sale_categories`
--
ALTER TABLE `sale_categories`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT dla tabeli `shops`
--
ALTER TABLE `shops`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
