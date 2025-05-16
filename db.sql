-- Create a new database named 'barbershop'
DROP DATABASE IF EXISTS barbershoptest;

CREATE DATABASE IF NOT EXISTS barbershoptest;
USE barbershoptest;

-- Create 'services' table
CREATE TABLE IF NOT EXISTS `services` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `service_name` VARCHAR(50) NOT NULL,
  `simage` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create 'barber' table
CREATE TABLE IF NOT EXISTS `barber` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `bname` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `phone` VARCHAR(15) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `image` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create a new 'barber_services' table for the many-to-many relationship
CREATE TABLE IF NOT EXISTS `barber_services` (
  `barber_id` INT(11) NOT NULL,
  `service_id` INT(11) NOT NULL,
  `charges` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`barber_id`, `service_id`),
  FOREIGN KEY (`barber_id`) REFERENCES `barber` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create 'customer' table
CREATE TABLE IF NOT EXISTS `customer` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `cname` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `phone` VARCHAR(15) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create 'appointment' table
CREATE TABLE IF NOT EXISTS `appointment` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `date_time` DATETIME NOT NULL,
  `service_id` INT(11) NOT NULL,
  `comments` VARCHAR(255) NOT NULL,
  `customer_id` INT(11) NOT NULL,
  `barber_id` INT(11) NOT NULL,
  `status` VARCHAR(50) NOT NULL DEFAULT 'Booked',
  PRIMARY KEY (`id`),
  FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`barber_id`) REFERENCES `barber` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,

  -- A unique constraint to ensure a customer can't create multiple appointments with the same barber
  UNIQUE KEY unique_customer_barber (customer_id, barber_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Insert data into 'services' table
INSERT INTO `services` (`service_name`,`simage`) VALUES
('Haircut','treat4.jpg'),
('Shaving','treat5.jpg'),
('Hair Coloring','treat1.jpg'),
('Beard Trim','treat6.jpg'),
('Hair Wash','treat7.jpg'),
('Head Massage','treat8.jpg'),
('Facial','treat9.jpg'),
('Hair Styling','treat3.jpg'),
('Nose Wax','treat11.jpg'),
('Eyebrow Shaping','treat10.jpg');

-- Insert data into 'barber' table
INSERT INTO `barber` (`bname`, `email`, `phone`, `password`,`image`) VALUES
('Azhar', 'azhar@example.com', '1234567890', 'password123','barber_team_02.jpg'),
('Shahmeer', 'shahmeer@example.com', '0987654321', 'password123','barber_team_03.jpg'),
('Bilal', 'bilal@example.com', '1122334455', 'password123','barber_team_01.jpg'),
('Kamran', 'kamran@example.com', '5566778899', 'password123','barber_team_42.jpg'),
('Waris', 'waris@example.com', '2233445566', 'password123','barber_team_43.jpg'),
('Michael', 'michael@example.com', '2233445566', 'password123','barber_team_41.jpg'),
('Zahid', 'zahid@example.com', '2233445566', 'password123','barber_team_05.jpg'),
('Asad', 'asad@example.com', '2233445566', 'password123','barber_team_06.jpg'),
('Harry', 'harry@example.com', '2233445566', 'password123','barber_team_07.jpg');

-- Insert data into 'barber_services' table linking barbers to services
INSERT INTO `barber_services` (`barber_id`, `service_id`, `charges`)
VALUES
    (1, 1, 200.00),
    (1, 2, 250.00),
    (2, 3, 180.00),
    (2, 4, 300.00),
    (3, 5, 380.00),
    (3, 4, 300.00),
    (4, 5, 180.00),
    (4, 7, 180.00),
    (5, 10, 180.00),
    (5, 9, 180.00),
    (6, 1, 180.00),
    (7, 1, 180.00),
    (8, 8, 180.00),
    (7, 8, 280.00),
    (8, 2, 180.00),
    (9, 2, 350.00),
    (3, 7, 220.00);


-- Insert data into 'customer' table
INSERT INTO `customer` (`cname`, `email`, `phone`, `password`) VALUES
('Shahid', 'shahid@example.com', '5556667777', 'password123'),
('Naveed', 'naveed@example.com', '5557778888', 'password123'),
('Ali', 'ali@example.com', '5558889999', 'password123'),
('Feroz', 'feroz@example.com', '5559991111', 'password123'),
('Sameer', 'sameer@example.com', '5551112222', 'password123');

-- Insert data into 'appointment' table
INSERT INTO `appointment` (`date_time`, `service_id`, `comments`, `customer_id`, `barber_id`) VALUES
('2023-11-10 10:00:00', 1, 'Regular haircut.', 1, 1),
('2023-11-10 11:00:00', 2, 'Please use a new blade.', 2, 1),
('2023-11-10 12:00:00', 5, 'Need a hair wash with hypoallergenic shampoo.', 3, 2),
('2023-11-10 13:00:00', 7, 'Looking for a relaxing facial.', 4, 3),
('2023-11-10 14:00:00', 8, 'Need to style for an event.', 5, 4),
('2023-11-10 15:00:00', 3, 'First time trying hair coloring.', 5, 1),
('2023-11-10 16:00:00', 4, 'Just a quick trim.', 2, 2),
('2023-11-10 17:00:00', 6, 'Head massage with oil.', 3, 3),
('2023-11-11 10:00:00', 9, 'Never had a nose wax before.', 4, 5),
('2023-11-11 11:00:00', 10, 'Eyebrow shaping for the first time.', 5, 5),
('2023-11-11 11:00:00', 7, 'Eyebrow shaping for the first time.', 5, 3),
('2023-11-11 11:00:00', 3, 'shaping for the first time.', 5, 2);

