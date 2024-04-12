CREATE DATABASE frota_de_onibus;

  use frota_de_onibus;

  CREATE TABLE bus (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    numero VARCHAR(30) NOT NULL,
    modelo VARCHAR(30) NOT NULL,
    rota VARCHAR(50) NOT NULL,
    location VARCHAR(50),
    date TIMESTAMP
  );