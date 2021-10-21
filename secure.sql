CREATE DATABASE secure;

USE secure;

CREATE TABLE login ( user varchar(255) NOT NULL, pass CHAR(60) NOT NULL , PRIMARY KEY (user) ); 

INSERT INTO login (user, pass) VALUES ("Danielshopper","$2y$10$Xdamxgj3W9hmBhQateFVxeMf8f4DV0U5Rzk3WCOkU0cZI/92j6zz6");
