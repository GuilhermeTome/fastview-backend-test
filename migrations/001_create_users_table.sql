CREATE TABLE `users` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(200) NOT NULL,
    `email` VARCHAR(200) NOT NULL,
    `token` VARCHAR(32) NOT NULL DEFAULT '',
    `password` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id`)
);