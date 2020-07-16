CREATE TABLE article (
                a_id int(11) not null PRIMARY KEY AUTO_INCREMENT,
                a_title varchar(256) not null,
                a_text text not null,
                a_author varchar(256) not null,
                a_date datetime not null
            );