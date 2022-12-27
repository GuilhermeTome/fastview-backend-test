CREATE TABLE `clients` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(200) NOT NULL,
    `email` VARCHAR(200) NOT NULL,
    `description` TEXT NOT NULL,
    PRIMARY KEY (`id`)
);