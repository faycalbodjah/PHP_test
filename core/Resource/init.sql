CREATE TABLE users (id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR(255) NOT NULL UNIQUE,
                    password VARCHAR(255) NOT NULL,
                    mail VARCHAR(255) NOT NULL
                    );
CREATE TABLE article (id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    title VARCHAR(255) NOT NULL ,
                    content TEXT NOT NULL,
                    author_id  INT(11) UNSIGNED NOT NULL,
                    FOREIGN KEY (author_id) REFERENCES users(id)
                    );
CREATE TABLE comment (id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR(255) NOT NULL UNIQUE,
                    content TEXT NOT NULL,
                    article_id INT(11) UNSIGNED NOT NULL,
                    FOREIGN KEY (article_id) REFERENCES article(id)
                    );
