-- Go to localhost\phpmyadmin
-- Create database with small letters
-- Create table with SQL

create table posts (
	id int(11) not null PRIMARY KEY AUTO_INCREMENT,
    	-- Create Column
    	-- Within int() you indicate how many numbers there can be wihtin a cell.
    	-- Not null: Cannot be empty, you ensure that is is saved inside the database
    	-- PRIMARY KEY
    	-- PRIMARY KEY AUTO_INCREMENT: Everytime a new entry is made, the number is increased by one
    subject varchar(128) not null,
    	-- New column
    	-- varchar(128): Max 128 characters
    content varchar(100) not null,
	date datetime not null
    	-- datetime y, m, d, h, min, sec, m
);

-- Modify Database in SQL
UPDATE posts SET subject = "This is a test", content="This is the content" WHERE id="1"
SELECT * FROM `posts` WHERE id="1" AND subject="This is the subject"
SELECT + FROM posts ORDER BY id ASC -- Order Ascending, opp. DESC
insert into posts (subject, content, date) VALUES ("This is the subject", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", "2015-11-14 16:38:01");
DELETE FROM posts WHERE id="1"

CREATE TABLE users (
    user_id int(11) AUTO_INCREMENT PRIMARY KEY not null,
    user_first varchar(258) NOT NULL,
    user_last varchar(258) NOT NULL,
    user_email varchar(258) NOT NULL,
    user_uid varchar(258) NOT NULL,
    user_pwd varchar(258) NOT NULL
);

INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd)
    VALUES ("Daniel", "Nielsen", "hello@test-mail.com", "Admin", "test123");

INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd)
    VALUES ("Seth", "Roth", "hello2@test-mail.com", "Seth23", "test456");