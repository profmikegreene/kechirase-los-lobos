-- USE DATABASE @@global.MYSQL_DATABASE DEFAULT CHARACTER SET utf8;
GRANT ALL ON @@global.MYSQL_DATABASE.* TO @@global.MYSQL_USER@'localhost' IDENTIFIED BY @@global.MYSQL_PASSWORD;
GRANT ALL ON @@global.MYSQL_DATABASE.* TO @@global.MYSQL_USER@'127.0.0.1' IDENTIFIED BY @@global.MYSQL_PASSWORD;
GRANT ALL ON @@global.MYSQL_DATABASE.* TO @@global.MYSQL_USER@@@global.DB_IP IDENTIFIED BY @@global.MYSQL_PASSWORD;