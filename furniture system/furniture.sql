-- This is a MySQL file
-- It is only serve to be a reference to the table inventory

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `inventory` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `buy_date` date NOT NULL,
  `category` varchar(20) NOT NULL,
  `buy_price` int NOT NULL,
  `sell_price` int NOT NULL,
  `stock` int NOT NULL)ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `inventory` (`id`,`name`, `buy_date`, `category`, `buy_price`, `sell_price`, `stock`)
VALUES 
(1,'white dinning chair', '2016-12-25', 'chair', 40, 50, 10),
(2,'brown desk', '2017-12-10', 'table', 55, 70, 5),
(3,'red dinning chair', '2018-10-10', 'chair', 50, 60, 10),
(4,'rog chair', '2019-04-03', 'chair', 12, 17, 10),
(5,'white dinning table', '2019-06-06', 'table', 85, 100, 5),
(6,'yellow rogbed', '2020-11-25', 'bed', 210, 300, 3),
(7,'king size bed', '2020-01-18', 'bed', 110, 150, 3),
(8,'oak closet', '2021-02-19', 'cabinet', 80, 120, 3),
(9,'white wardrobe', '2022-04-29', 'cabinet', 60, 100, 3),
(10,'white light', '2023-03-01', 'light', 3, 4, 20),
(11,'yellow dinning chair', '2023-02-08', 'chair', 25, 30, 12),
(12,'soft pink bed', '2022-06-24', 'bed', 22, 27, 6),
(13,'coffee table', '2022-07-29', 'table', 130, 150, 7),
(14,'red wardrobe', '2022-09-28', 'cabinet', 160, 200, 2),
(15,'full size bed', '2021-05-06', 'bed', 35, 46, 5),
(16,'yellow lamp', '2020-09-06', 'light', 69, 89, 10),
(17,'oak desk', '2019-09-18', 'table', 88, 120, 2),
(18,'single size table', '2020-09-10', 'table', 8, 14, 8),
(19,'rocking chair', '2020-08-10', 'chair', 50, 60, 9),
(20,'ceiling lamp', '2021-07-02', 'light', 230, 290, 6);
       
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `inventory`
  MODIFY `id` INT NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21; COMMIT;


