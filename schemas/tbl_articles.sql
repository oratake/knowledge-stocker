DROP TABLE IF EXISTS `tbl_articles`;
CREATE TABLE `tbl_articles` (
	id INT UNSIGNED auto_increment,
	title VARCHAR NOT NULL,
	article_body TEXT,
	created_at DATETIME,
	updated_at DATETIME,
	PRIMARY KEY(id)
)
ENGINE=InnoDB;
-- DEFAULT CHARSET=utf8mb4
-- COLLATE=utf8mb4_general_ci;