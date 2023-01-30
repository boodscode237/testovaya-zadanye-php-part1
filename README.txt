CREATE TABLE Articles, Groups and users
[x] Make 2 CRUD pages
    The First Should display Articles
    The Second should allow to add/redact articles
[x] Add users
    admin is super_user
    moderator is admin and editor
    user is public
    editor is editor
[x] Add Groups
    super_user can CREATE, READ, UPDATE, DELETE any database(Articles, users, Groups)
    admin has as member : (moderator) and can CREATE users, CREATE, UPDATE  Articles
    public has member user can read articles
    editor has members (moderator and editor) can CREATE, EDIT articles.


/*
CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) UNIQUE,
    password VARCHAR(255),
    role VARCHAR(50)
);

CREATE TABLE articles (
    article_id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255),
    content TEXT,
    author_id INT,
    FOREIGN KEY (author_id) REFERENCES users(user_id)
);

CREATE TABLE groups (
    group_id INT PRIMARY KEY AUTO_INCREMENT,
    group_name VARCHAR(255),
    permissions VARCHAR(50)
);

CREATE TABLE user_groups (
    user_id INT,
    group_id INT,
    PRIMARY KEY (user_id, group_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (group_id) REFERENCES groups(group_id)
);
*/

/*
CREATE TABLE Articles (
    id INT AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    author_id INT NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE Users (
    id INT AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('super_user', 'admin', 'public', 'editor', 'moderator') NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE Groups (
    id INT AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE Group_users (
    id INT AUTO_INCREMENT,
    group_id INT NOT NULL,
    user_id INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (group_id) REFERENCES Groups (id),
    FOREIGN KEY (user_id) REFERENCES Users (id)
);
*/