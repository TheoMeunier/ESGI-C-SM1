CREATE TABLE esgi_user
(
    id         INT AUTO_INCREMENT PRIMARY KEY,
    username   VARCHAR(40)  NOT NULL,
    email      VARCHAR(320) NOT NULL,
    password   VARCHAR(255) NOT NULL,
    avatar     VARCHAR(255),
    verify     TINYINT(1) DEFAULT 0,
    is_deleted TINYINT(1) DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE esgi_information_photograph
(
    id          INT AUTO_INCREMENT PRIMARY KEY,
    user_id     INT         NOT NULL,
    firstname   VARCHAR(40) NOT NULL,
    lastname    VARCHAR(40) NOT NULL,
    description TEXT        NOT NULL,
    city        VARCHAR(58),
    country     VARCHAR(58),
    is_deleted  TINYINT(1) DEFAULT 0,
    created_at  DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at  DATETIME DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT FK_users_information_photograph FOREIGN KEY (user_id) REFERENCES esgi_user (id) ON DELETE CASCADE
);

CREATE TABLE esgi_role
(
    id         INT AUTO_INCREMENT PRIMARY KEY,
    name       VARCHAR(40) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE esgi_user_role
(
    id      INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    role_id INT NOT NULL,

    CONSTRAINT FK_users_roles FOREIGN KEY (user_id) REFERENCES esgi_user (id) ON DELETE CASCADE,
    CONSTRAINT FK_roles_users FOREIGN KEY (role_id) REFERENCES esgi_role (id) ON DELETE CASCADE
);

CREATE TABLE esgi_reset_password
(
    id         INT AUTO_INCREMENT PRIMARY KEY,
    user_id    INT          NOT NULL,
    token      VARCHAR(255) NOT NULL,
    expired_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT FK_users_reset_passwords FOREIGN KEY (user_id) REFERENCES esgi_user (id) ON DELETE CASCADE
);

CREATE TABLE esgi_comment
(
    id          INT AUTO_INCREMENT PRIMARY KEY,
    content     TEXT NOT NULL,
    is_reported TINYINT(1) DEFAULT 0,
    user_id     INT  NOT NULL,
    comment_id  INT,
    picture_id  INT,
    is_deleted  TINYINT(1) DEFAULT 0,
    created_at  DATETIME   DEFAULT CURRENT_TIMESTAMP,
    updated_at  DATETIME   DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT FK_users_comments FOREIGN KEY (user_id) REFERENCES esgi_user (id) ON DELETE CASCADE,
    CONSTRAINT FK_comments FOREIGN KEY (comment_id) REFERENCES esgi_comment (id) ON DELETE CASCADE,
    CONSTRAINT FK_pictures FOREIGN KEY (picture_id) REFERENCES esgi_picture (id) ON DELETE CASCADE
);

CREATE TABLE esgi_category
(
    id         INT AUTO_INCREMENT PRIMARY KEY,
    name       VARCHAR(40) NOT NULL,
    slug       VARCHAR(40) NOT NULL,
    is_deleted TINYINT(1) DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE esgi_picture
(
    id          INT AUTO_INCREMENT PRIMARY KEY,
    name        VARCHAR(40) NOT NULL,
    slug        VARCHAR(50) NOT NULL,
    description TEXT        NOT NULL,
    image       VARCHAR(255),
    user_id     INT         NOT NULL,
    is_deleted  TINYINT(1) DEFAULT 0,
    created_at  DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at  DATETIME DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT FK_users_pictures FOREIGN KEY (user_id) REFERENCES esgi_user (id)
);

CREATE TABLE esgi_comment
(
    id          INT AUTO_INCREMENT PRIMARY KEY,
    content     TEXT NOT NULL,
    is_reported TINYINT(1) DEFAULT 0,
    user_id     INT  NOT NULL,
    comment_id  INT,
    picture_id  INT NOT NULL,
    is_deleted  TINYINT(1) DEFAULT 0,
    created_at  DATETIME   DEFAULT CURRENT_TIMESTAMP,
    updated_at  DATETIME   DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT FK_users_comments FOREIGN KEY (user_id) REFERENCES esgi_user (id) ON DELETE CASCADE,
    CONSTRAINT FK_comments FOREIGN KEY (comment_id) REFERENCES esgi_comment (id) ON DELETE CASCADE,
    CONSTRAINT FK_picture FOREIGN KEY (comment_id) REFERENCES esgi_picture (id) ON DELETE CASCADE,
);

CREATE TABLE esgi_picture_category
(
    id          INT AUTO_INCREMENT PRIMARY KEY,
    picture_id  INT NOT NULL,
    category_id INT NOT NULL,

    CONSTRAINT FK_pictures_pictures_categories FOREIGN KEY (picture_id) REFERENCES esgi_picture (id) ON DELETE CASCADE,
    CONSTRAINT FK_categories_pictures_categories FOREIGN KEY (category_id) REFERENCES esgi_category (id) ON DELETE CASCADE
);

CREATE TABLE esgi_page
(
    id              INT AUTO_INCREMENT PRIMARY KEY,
    name            VARCHAR(40) NOT NULL,
    title           VARCHAR(40) NOT NULL,
    slug            VARCHAR(40) NOT NULL,
    metadescription TEXT        NOT NULL,
    content         LONGTEXT        NOT NULL,
    is_deleted      TINYINT(1) DEFAULT 0,
    is_hidden       TINYINT(1) DEFAULT 1,
    created_at      DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at      DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE esgi_log
(
    id         INT AUTO_INCREMENT PRIMARY KEY,
    user_id    INT,
    action     VARCHAR(40) NOT NULL,
    subject    VARCHAR(40) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT FK_users_logs FOREIGN KEY (user_id) REFERENCES esgi_user (id) ON DELETE CASCADE
);


CREATE TABLE esgi_image
(
    id         INT AUTO_INCREMENT PRIMARY KEY,
    image      VARCHAR(255) NOT NULL,
    picture_id INT          NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT FK_photos_images FOREIGN KEY (picture_id) REFERENCES esgi_picture (id) ON DELETE CASCADE
);

-- INSERTS ROLES
INSERT INTO `esgi_role` (name)
VALUES ('ROLE_ADMIN');
INSERT INTO `esgi_role` (name)
VALUES ('ROLE_USER');
INSERT INTO `esgi_role` (name)
VALUES ('ROLE_AUTHOR');

-- INSERT PAGE
INSERT INTO
    `esgi_page` (name,title, metadescription , slug, content)
VALUES
    ('Accueil','Accueil', 'accueil', '/', 'Contenu de la page d\'accueil'),
    ('Contact','Contact', 'contact', '/contact', 'Contenu de la page de contact'),
    ('À propos','a-propos' , 'a-propos', '/about', 'Contenu de la page à propos'),
    ('Galerie','galerie', 'galerie', '/gallery', 'Contenu de la galerie'),