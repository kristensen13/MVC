CREATE TABLE personas
(
id int primary key AUTO_INCREMENT,
nombre VARCHAR(100) NOT NULL,
edad INT,
estatura FLOAT

)
INSERT INTO `personas` (`id`, `nombre`, `edad`, `estatura`) VALUES (NULL, 'Bruno', '16', '1.65'), (NULL, 'Adolfo', '54', '1.82'),(NULL, 'Olga', '32', '1.68'),(NULL, 'Sara', '15', '1.59'),(NULL, 'Lucas', '82', '1.73')