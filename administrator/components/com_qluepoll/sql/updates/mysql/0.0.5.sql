CREATE TABLE `#__qluepoll_awnsers` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`poll_id` INT,
	`name` TEXT,
	`votes` INT DEFAULT '0',
	PRIMARY KEY (`id`)
);

CREATE TABLE `#__qluepoll_votes` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`poll_id` INT NOT NULL,
	`awnser_id` INT NOT NULL,
	`ip` TEXT NOT NULL,
	PRIMARY KEY (`id`)
);

UPDATE TABLE `#__qluepoll` (
	`category_id` INT,
);