# EPE3

A continuación se incluyen las consultas SQL utilizadas para crear la Base de Datos

CREATE DATABASE bd_epe;

USE bd_epe;

CREATE TABLE Carreras (
  cod_car INT PRIMARY KEY,
  nom_car VARCHAR(80)
);

CREATE TABLE Mensualidad (
  folio INT PRIMARY KEY,
  fecha_pago DATE,
  valor_cuota FLOAT,
  cod_car INT,
  rut VARCHAR(18),
  FOREIGN KEY (cod_car) REFERENCES Carreras(cod_car),
  FOREIGN KEY (rut) REFERENCES Alumno(rut)
);

CREATE TABLE Alumno (
  rut VARCHAR(18),
  nom_alu VARCHAR(80),
  fec_nac DATE,
  genero VARCHAR(1),
  PRIMARY KEY (rut)
);
-- Inserción de datos en la tabla Carreras
INSERT INTO Carreras (cod_car, nom_car) VALUES
(1, 'Ingeniería Informática'),
(2, 'Administración de Empresas'),
(3, 'Psicología');

-- Inserción de datos en la tabla Alumno
INSERT INTO Alumno (rut, nom_alu, fec_nac, genero) VALUES
('11111111-1', 'Juan Pérez', '1995-05-10', 'M'),
('22222222-2', 'María López', '1998-09-22', 'F'),
('33333333-3', 'Carlos Ramírez', '1997-03-15', 'M');

-- Inserción de datos en la tabla Mensualidad
INSERT INTO Mensualidad (folio, fecha_pago, valor_cuota, cod_car, rut) VALUES
(1, '2023-06-01', 250.50, 1, '11111111-1'),
(2, '2023-06-02', 150.00, 2, '22222222-2'),
(3, '2023-06-03', 300.75, 3, '33333333-3');
