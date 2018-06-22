CREATE DATABASE cr10_name_surname_biglibrary;


CREATE TABLE media_item(
	media_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	fk_media_publisher INT NOT NULL,
	fk_media_type INT,
    fk_rent_id INT,
    media_title VARCHAR(50),
	media_descri TEXT,
	media_pub_date DATE,
	FOREIGN KEY (`fk_media_type`) REFERENCES `media_type` (`media_type_id`),
    FOREIGN KEY (`fk_rent_id`) REFERENCES `rents` (`rent_id`),
    FOREIGN KEY (`fk_media_publisher`) REFERENCES `publisher` (`publisher_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1

CREATE TABLE author(
	author_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	author_firstname VARCHAR(30),
    author_secondname VARCHAR(30)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
    
CREATE TABLE publisher(
	publisher_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	publisher_name VARCHAR(30),
    publisher_size ENUM('Tiny', 'Small', 'Medium', 'Large', 'Huge'),
    operating_area VARCHAR(30)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE media_type(
	media_type_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	media_type_name VARCHAR(30)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE users(
	user_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	user_firstname VARCHAR(30) NOT NULL,
    user_lastname VARCHAR(30) NOT NULL,
    user_email VARCHAR(50) UNIQUE KEY NOT NULL,
    user_password VARCHAR(8) NOT NULL,
    user_reg_date DATE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE rents(
	rent_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	fk_user INT NOT NULL,
    from_date DATE NOT NULL,
    to_date DATE NOT NULL,
	FOREIGN KEY (`fk_user`) REFERENCES `users`(`user_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

INSERT INTO media_items (`media_title`, `media_descri`, `media_pub_date`, `available`) VALUES
	('Bau.steine', '', STR_TO_DATE('01-01-2018', '%d-%m-%Y'), 'true');