CREATE TABLE `activitys` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` int(10) NOT NULL,
  `image_01` varchar(100) NOT NULL,
  `image_02` varchar(100) NOT NULL,
  `image_03` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `activitys`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `activitys`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
