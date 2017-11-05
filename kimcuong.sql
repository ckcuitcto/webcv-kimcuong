-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 27, 2017 at 01:04 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kimcuong`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE IF NOT EXISTS `binhluan` (
  `idBL` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `noidung` text NOT NULL,
  `idSP` int(11) NOT NULL,
  `Ngaytao` date DEFAULT NULL,
  `Ngaysua` date DEFAULT NULL,
  PRIMARY KEY (`idBL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hinh`
--

CREATE TABLE IF NOT EXISTS `hinh` (
  `idhinh` int(11) NOT NULL AUTO_INCREMENT,
  `idsp` int(11) NOT NULL,
  `tenhinh` varchar(255) NOT NULL,
  PRIMARY KEY (`idhinh`,`idsp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

CREATE TABLE IF NOT EXISTS `loaisanpham` (
  `idloaiSP` int(11) NOT NULL AUTO_INCREMENT,
  `tenloaiSP` varchar(255) NOT NULL,
  `aliasLSP` varchar(255) NOT NULL,
  `thutu` int(11) NOT NULL,
  `anhien` int(11) NOT NULL,
  `idTL` int(11) NOT NULL,
  PRIMARY KEY (`idloaiSP`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`idloaiSP`, `tenloaiSP`, `aliasLSP`, `thutu`, `anhien`, `idTL`) VALUES
(1, 'Nhẫn vàng', 'nhan-vang', 1, 1, 5),
(2, 'Lắc tay vàng', 'lac-tay-vang', 2, 1, 5),
(3, 'Dây chuyền vàng', 'day-chuyen-vang', 3, 1, 5),
(4, 'Lắc chân vàng', 'lac-chan-vang', 4, 1, 5),
(5, 'Nhẫn bạc', 'nhan-bac', 1, 1, 6),
(6, 'Lắc tay bạc', 'lac-tay-bac', 2, 1, 6),
(7, 'Dây chuyền  bạc', 'day-chuyen-bac', 3, 1, 6),
(8, 'Lắc chân  bạc', 'lac-chan-bac', 4, 1, 6),
(9, 'Nhẫn kim cương', 'nhan-kim-cuong', 1, 1, 7),
(10, 'Lắc tay kim cương', 'lac-tay-kim-cuong', 2, 1, 7),
(11, 'Dây chuyền kim cương', 'day-chuyen-kim-cuong', 3, 1, 7),
(12, 'Lắc chân kim cương', 'lac-chan-kim-cuong', 4, 1, 7),
(13, 'Nhẫn Ngọc Trai', 'nhan-ngoc-trai', 1, 1, 8),
(14, 'Lắc tay Ngọc Trai', 'lac-tay-ngoc-trai', 2, 1, 8),
(15, 'Dây chuyền Ngọc Trai', 'day-chuyen-ngoc-trai', 3, 1, 8),
(16, 'Lắc chân Ngọc Trai', 'lac-chan-ngoc-trai', 4, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE IF NOT EXISTS `sanpham` (
  `idSP` int(11) NOT NULL AUTO_INCREMENT,
  `tenSP` varchar(255) NOT NULL,
  `hinh` varchar(255) NOT NULL,
  `gia` int(11) NOT NULL,
  `ngay` date DEFAULT '0000-00-00',
  `noidung` text NOT NULL,
  `solanxem` int(11) NOT NULL,
  `anhien` int(11) NOT NULL,
  `idTL` int(11) NOT NULL,
  `idloaiSP` int(11) NOT NULL,
  PRIMARY KEY (`idSP`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`idSP`, `tenSP`, `hinh`, `gia`, `ngay`, `noidung`, `solanxem`, `anhien`, `idTL`, `idloaiSP`) VALUES
(2, 'Nhẫn Kim Cương 1', '5.png', 30000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu với 8 viên kim cương tròn trong suốt thuợng hạng   tổng sức nặng 0,46carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi', 0, 1, 7, 9),
(3, 'Nhẫn Kim Cương 2', '5.png', 284000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu với 30 viên kim cương tròn trong suốt thuợng hạng  tổng sức nặng 0,42carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 7, 9),
(4, 'Nhẫn Kim Cương 3', '5.png', 456000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương  đầy phong cách này nạm chấu micro&prong với 50 viên kim cương tròn trong suốt thuợng hạng nặng tổng cộng 0,75carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn. Có thể gắn vừa hột 8,0MM.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 7, 9),
(5, 'Nhẫn Kim Cương 4', '5.png', 456000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu với 98 viên kim cương tròn trong suốt thuợng hạng  tổng sức nặng 0,95carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 7, 9),
(6, 'Nhẫn Kim Cương 5', '5.png', 456000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 7, 9),
(7, 'Nhẵn Ngoc Trai 1', '6.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 8, 13),
(8, 'Nhẵn Ngoc Trai 2', '6.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 8, 13),
(9, 'Nhẵn Ngoc Trai 3', '6.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 8, 13),
(10, 'Nhẵn Ngoc Trai 4', '6.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 8, 13),
(11, 'Nhẵn Bạc 1', '7.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 6, 5),
(12, 'Nhẵn Bạc 2', '7.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 6, 5),
(13, 'Nhẵn Bạc 3', '7.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 6, 5),
(14, 'Nhẵn Bạc 4', '7.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 6, 5),
(15, 'Lắc tay bạc 1', '8.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 6, 6),
(16, 'Lắc tay bạc 2', '8.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 6, 6),
(17, 'Lắc tay bạc 3', '8.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 6, 6),
(18, 'Lắc tay bạc 4', '8.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 6, 6),
(19, 'Nhẵn Vàng 1', '9.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 5, 1),
(20, 'Nhẵn Vàng 2', '9.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 5, 1),
(21, 'Nhẵn Vàng 3', '9.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 5, 1),
(22, 'Nhẵn Vàng 4', '9.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 5, 1),
(23, 'Lắc Tay Vàng 1', '10.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 5, 2),
(24, 'Lắc Tay Vàng 2', '10.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 5, 2),
(25, 'Lắc Tay Vàng 3', '10.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 5, 2),
(26, 'Lắc Tay Vàng 4', '10.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 5, 2),
(27, 'Dây Chuyền Vàng 1', '11.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 5, 3),
(28, 'Dây Chuyền Vàng 2', '11.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 5, 3),
(29, 'Dây Chuyền Vàng 3', '11.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 5, 3),
(30, 'Dây Chuyền Vàng 4', '11.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 5, 3),
(31, 'Lắc Chân Vàng 1', '12.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 5, 4),
(32, 'Lắc Chân Vàng 2', '12.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 5, 4),
(33, 'Lắc Chân Vàng 3', '12.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 5, 4),
(34, 'Lắc Chân Vàng 4', '12.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 5, 4),
(35, 'Lắc Tay Bạc 1', '13.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 6, 6),
(36, 'Lắc Tay Bạc 2', '13.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 6, 6),
(37, 'Lắc Tay Bạc 3', '13.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 6, 6),
(38, 'Lắc Tay Bạc 4', '13.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 6, 6),
(39, 'Dây Chuyền Bạc 1', '14.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 6, 7),
(40, 'Dây Chuyền Bạc 2', '14.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 6, 7),
(41, 'Dây Chuyền Bạc 3', '14.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 6, 7),
(42, 'Dây Chuyền Bạc 4', '14.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 6, 7),
(43, 'Lắc Chân Bạc 4', '15.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 6, 8),
(44, 'Lắc Chân Bạc 1', '15.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 6, 8),
(45, 'Lắc Chân Bạc 2', '15.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 6, 8),
(46, 'Lắc Chân Bạc 3', '15.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 6, 8),
(47, 'Lắc Tay Kim Cương 1', '16.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 7, 10),
(48, 'Lắc Tay Kim Cương 2', '16.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 7, 10),
(49, 'Lắc Tay Kim Cương 3', '16.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 7, 10),
(50, 'Lắc Tay Kim Cương 4', '16.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 7, 10),
(51, 'Dây Chuyền Kim Cương 1', '17.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 7, 11),
(52, 'Dây Chuyền Kim Cương 2', '17.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 7, 11),
(53, 'Dây Chuyền Kim Cương 3', '17.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 7, 11),
(54, 'Dây Chuyền Kim Cương 4', '17.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 7, 11),
(55, 'Lắc Chân Kim Cương 1', '18.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 7, 12),
(56, 'Lắc Chân Kim Cương 2', '18.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 7, 12),
(57, 'Lắc Chân Kim Cương 3', '18.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 7, 12),
(58, 'Lắc Chân Kim Cương 4', '18.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 7, 12),
(59, 'Lắc Tay Ngọc Trai 1', '19.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 8, 14),
(60, 'Lắc Tay Ngọc Trai 2', '19.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 8, 14),
(61, 'Lắc Tay Ngọc Trai 3', '19.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 8, 14),
(62, 'Lắc Tay Ngọc Trai 4', '19.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 8, 14),
(63, 'Dây Chuyền Ngọc Trai 1', '20.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 8, 15),
(64, 'Dây Chuyền Ngọc Trai 2', '20.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 8, 15),
(65, 'Dây Chuyền Ngọc Trai 3', '20.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 8, 15),
(66, 'Dây Chuyền Ngọc Trai 4', '20.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 8, 15),
(67, 'Lắc Chân Ngọc Trai 1', '21.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 8, 16),
(68, 'Lắc Chân Ngọc Trai 2', '21.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 8, 16),
(69, 'Lắc Chân Ngọc Trai 3', '21.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 8, 16),
(70, 'Lắc Chân Ngọc Trai 4', '21.png', 150000, NULL, 'Chiếc vỏ nhẫn đính hôn kim cương đầy phong cách này nạm chấu prong với 64 viên kim cương tròn trong suốt thuợng hạng tổng sức nặng 1,37carat vòng quanh tôn vinh thêm vẻ đẹp tuyệt vời của sự lựa chọn của bạn qua viên kim cương chính giữa chiếc nhẫn.Viên kim cương chính ở giữa chiếc nhẫn được bán riêng. Mời quý khách chọn lựa trong bộ sưu tập kim cương có giấy chứng nhận G.I.A và E.G.L của chúng tôi.', 0, 1, 8, 16);

-- --------------------------------------------------------

--
-- Table structure for table `theloai`
--

CREATE TABLE IF NOT EXISTS `theloai` (
  `idTL` int(11) NOT NULL AUTO_INCREMENT,
  `tenTL` varchar(255) NOT NULL,
  `thutu` int(11) NOT NULL,
  `anhien` int(11) NOT NULL,
  PRIMARY KEY (`idTL`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `theloai`
--

INSERT INTO `theloai` (`idTL`, `tenTL`, `thutu`, `anhien`) VALUES
(5, 'Trang sức vàng', 1, 1),
(6, 'Trang sức Bạc', 2, 1),
(7, 'Trang sức Kim Cương', 3, 1),
(8, 'Trang sức Ngọc Trai', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `cap` tinyint(4) NOT NULL DEFAULT '1',
  `ngaytao` date NOT NULL,
  `ngaysua` date NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
