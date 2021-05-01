-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 01, 2021 lúc 10:35 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `business_service`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `biz_categories`
--

CREATE TABLE `biz_categories` (
  `Business_ID` decimal(10,0) DEFAULT NULL,
  `Category_ID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `biz_categories`
--

INSERT INTO `biz_categories` (`Business_ID`, `Category_ID`) VALUES
('1', 'FISH'),
('1', 'HEALTH');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `businesses`
--

CREATE TABLE `businesses` (
  `Business_ID` decimal(10,0) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Telephone` varchar(15) NOT NULL,
  `URL` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `businesses`
--

INSERT INTO `businesses` (`Business_ID`, `Name`, `Address`, `City`, `Telephone`, `URL`) VALUES
('1', 'LeardorfBeauty Salon and Academy', '123 Any Street', 'Toronto', '0866422499', 'https://www.google.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `Category_ID` varchar(100) NOT NULL,
  `Title` varchar(300) NOT NULL,
  `Description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`Category_ID`, `Title`, `Description`) VALUES
('AUTO', 'Automotive Parts and Supplies', 'Accessories for your car'),
('FISH', 'Seafood Stores and Restaurants', 'Place to get your fish'),
('HEALTH', 'Health And Beauty', 'Everything for the body'),
('SPORTS', 'Comunity Sports and Recreation', 'Guide to Parks and Leaguages');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `biz_categories`
--
ALTER TABLE `biz_categories`
  ADD KEY `FK_Category` (`Category_ID`),
  ADD KEY `FK_Business` (`Business_ID`);

--
-- Chỉ mục cho bảng `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`Business_ID`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `biz_categories`
--
ALTER TABLE `biz_categories`
  ADD CONSTRAINT `FK_Business` FOREIGN KEY (`Business_ID`) REFERENCES `businesses` (`Business_ID`),
  ADD CONSTRAINT `FK_Category` FOREIGN KEY (`Category_ID`) REFERENCES `categories` (`Category_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
