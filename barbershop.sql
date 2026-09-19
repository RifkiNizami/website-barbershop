CREATE TABLE `users` (
  `user_id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100),
  `email` varchar(100) UNIQUE,
  `password` varchar(255),
  `phone` varchar(20),
  `role` varchar(20),
  `created_at` timestamp
);

CREATE TABLE `barbers` (
  `barber_id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100),
  `phone` varchar(20),
  `status` varchar(20),
  `created_at` timestamp
);

CREATE TABLE `services` (
  `service_id` int PRIMARY KEY AUTO_INCREMENT,
  `service_name` varchar(100),
  `description` text,
  `price` decimal(12,2),
  `status` varchar(20)
);

CREATE TABLE `bookings` (
  `booking_id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int,
  `service_id` int,
  `booking_date` date,
  `booking_time` time,
  `queue_number` int,
  `status` varchar(30),
  `created_at` timestamp
);

CREATE TABLE `barber_assignments` (
  `assignment_id` int PRIMARY KEY AUTO_INCREMENT,
  `booking_id` int,
  `barber_id` int,
  `assigned_by` int,
  `assigned_at` timestamp,
  `assignment_status` varchar(30)
);

CREATE TABLE `payment` (
  `payment_id` int PRIMARY KEY AUTO_INCREMENT,
  `booking_id` int,
  `payment_method` varchar(20),
  `amount` decimal(12,2),
  `payment_status` varchar(20),
  `payment_date` timestamp,
  `transaction_code` varchar(100)
);

CREATE TABLE `reviews` (
  `review_id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int,
  `rating` int,
  `review` text,
  `created_at` timestamp
);

ALTER TABLE `bookings` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

ALTER TABLE `bookings` ADD FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`);

ALTER TABLE `barber_assignments` ADD FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`booking_id`);

ALTER TABLE `barber_assignments` ADD FOREIGN KEY (`barber_id`) REFERENCES `barbers` (`barber_id`);

ALTER TABLE `barber_assignments` ADD FOREIGN KEY (`assigned_by`) REFERENCES `users` (`user_id`);

ALTER TABLE `payment` ADD FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`booking_id`);

ALTER TABLE `reviews` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
