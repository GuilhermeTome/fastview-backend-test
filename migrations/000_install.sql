CREATE TABLE IF NOT EXISTS `migrations` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `migration` VARCHAR(200) NOT NULL,
    `created_at` TIMESTAMP NOT NULL,
    PRIMARY KEY (`id`)
);