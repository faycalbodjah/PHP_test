CREATE TABLE users (id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR(40) NOT NULL UNIQUE,
                    password VARCHAR(40) NOT NULL,
                    confirm_password VARCHAR(40) NOT NULL
                    );
CREATE TABLE article (id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    title VARCHAR(40) NOT NULL ,
                    content TEXT NOT NULL,
                    author_id SMALLINT UNSIGNED NOT NULL,
                    FOREIGN KEY (author_id) REFERENCES users(id)
                    );
CREATE TABLE comment (id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR(40) NOT NULL UNIQUE,
                    content TEXT NOT NULL,
                    article_id SMALLINT UNSIGNED NOT NULL,
                    FOREIGN KEY (article_id) REFERENCES article(id)
                    );
