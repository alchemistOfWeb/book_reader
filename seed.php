<?php
$sql = 
    'CREATE TABLE `book_reader`.`books` ( `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT , `title` VARCHAR(255) NULL DEFAULT NULL , `description` TEXT NULL DEFAULT NULL , `path` VARCHAR(1024) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;';