CREATE TABLE pilotos (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  edad INT UNSIGNED NOT NULL,
  nacionalidad VARCHAR(100) NOT NULL,
  escuderia VARCHAR(100) NOT NULL,
  numero INT UNSIGNED NOT NULL,
  victorias INT UNSIGNED NOT NULL,
  campeonatos INT UNSIGNED NOT NULL,
  estado VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO pilotos (nombre, edad, nacionalidad, escuderia, numero, victorias, campeonatos, estado) VALUES('Alain Prost', 69, 'Francés', 'Williams', 2, 51, 4, 'Retirado');
INSERT INTO pilotos (nombre, edad, nacionalidad, escuderia, numero, victorias, campeonatos, estado) VALUES('Fernando Alonoso', 42, 'Español', 'Aston Martin', 14, 32, 2, 'Activo');
INSERT INTO pilotos (nombre, edad, nacionalidad, escuderia, numero, victorias, campeonatos, estado) VALUES('Max Verstappen', 25, 'Holandés', 'Red Bull', 1, 60, 4, 'Activo');
INSERT INTO pilotos (nombre, edad, nacionalidad, escuderia, numero, victorias, campeonatos, estado) VALUES('Micheal Schumacher', 55, 'Alemán', 'Ferrari', 3, 91, 6, 'Desconocido');
INSERT INTO pilotos (nombre, edad, nacionalidad, escuderia, numero, victorias, campeonatos, estado) VALUES('Niki Lauda', 70, 'Austriaco', 'Ferrari', 12, 25, 3, 'Fallecido');
INSERT INTO pilotos (nombre, edad, nacionalidad, escuderia, numero, victorias, campeonatos, estado) VALUES('Ayrton Senna', 34, 'Brasileño', 'Williams', 11, 41, 3, 'Fallecido');
INSERT INTO pilotos (nombre, edad, nacionalidad, escuderia, numero, victorias, campeonatos, estado) VALUES('Juan Manuel Fangio', 84, 'Argentino', 'Ferrari', 658, 24, 5, 'Fallecido');


