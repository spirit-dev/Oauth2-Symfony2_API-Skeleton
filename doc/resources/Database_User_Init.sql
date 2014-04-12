
CREATE USER 'cubbyholeuser'@'localhost' IDENTIFIED BY 'cubbyholepass';

GRANT ALL PRIVILEGES ON *.cubbyhole TO 'cubbyholeuser'@'localhost' IDENTIFIED BY 'cubbyholepass';