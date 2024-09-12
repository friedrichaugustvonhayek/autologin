CREATE USER 'autologinUser'@localhost IDENTIFIED BY 'changeThisPassword1234';
CREATE DATABASE autologinDB;
GRANT ALL PRIVILEGES ON *.* TO 'autologinUser'@localhost IDENTIFIED BY 'changeThisPassword1234';
USE autologinDB;
CREATE TABLE credentials ( id int(11) NOT NULL AUTO_INCREMENT, username varchar(50), password varchar(50), PRIMARY KEY (id) );
CREATE TABLE userData ( id int(11) NOT NULL AUTO_INCREMENT, username varchar(50), password varchar(50), PRIMARY KEY (id) );
CREATE TABLE comments (id int(11) NOT NULL AUTO_INCREMENT, comment TEXT, timestamp VARCHAR(20), PRIMARY KEY (id));

