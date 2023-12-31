CREATE DATABASE GRUPO_DE_INVESTIGADORES 
GO
USE GRUPO_DE_INVESTIGADORES 

-- TABLA CONVOCATORIAS
CREATE TABLE CONVOCATORIAS (
    CONVOCATORIAID INT PRIMARY KEY,
    FECHAPUBLICACION DATE,
    ORGANISMOPROMOTOR VARCHAR(100),
    PROGRAMA VARCHAR(100),
    FECHALIMITE DATE,
    WEBINFORMACION VARCHAR(200),
    NUMEROBOEDOGV VARCHAR(50),
    FECHARESOLUCION DATE
);

-- TABLA ORGANISMOS
CREATE TABLE ORGANISMOS (
    ORGANISMOID INT PRIMARY KEY,
    NOMBRE VARCHAR(100),
    DIRECCION VARCHAR(200),
    POBLACION VARCHAR(100),
    CODIGOPOSTAL VARCHAR(10),
    TELEFONO VARCHAR(20)
);

-- TABLA INVESTIGADORES
CREATE TABLE INVESTIGADORES (
    INVESTIGADORID INT PRIMARY KEY,
    NOMBREINVESTIGADOR VARCHAR(100),
    DEPARTAMENTO VARCHAR(100),
    AREACONOCIMIENTO VARCHAR(100)
);

-- TABLA DEPARTAMENTOS
CREATE TABLE DEPARTAMENTOS (
    DEPARTAMENTOID INT PRIMARY KEY,
    NOMBREDEPARTAMENTO VARCHAR(100),
    NOMBREDIRECTOR VARCHAR(100)
);

-- TABLA GRUPOS DE INVESTIGACION
CREATE TABLE GRUPOSINVESTIGACION (
    GRUPOID INT PRIMARY KEY,
    NOMBREGRUPO VARCHAR(100),
    INVESTIGADORRESPONSABLE INT,
    FOREIGN KEY (INVESTIGADORRESPONSABLE) REFERENCES INVESTIGADORES(INVESTIGADORID)
);

-- TABLA MIEMBROS DEL GRUPO
CREATE TABLE MIEMBROSGRUPO (
    MIEMBROID INT PRIMARY KEY,
    GRUPOID INT,
    NOMBREINVESTIGADOR VARCHAR(100),
    HORASPORSEMANA INT,
    FOREIGN KEY (GRUPOID) REFERENCES GRUPOSINVESTIGACION(GRUPOID)
);

-- TABLA SOLICITUDES
CREATE TABLE SOLICITUDES (
    SOLICITUDID INT PRIMARY KEY,
    CONVOCATORIAID INT,
    FECHAPRESENTACION DATE,
    TITULOPROYECTO VARCHAR(200),
    INVESTIGADORPRINCIPAL VARCHAR(100),
    DEPARTAMENTOINVESTIGADOR VARCHAR(100),
    FECHARESOLUCIONSOLICITUD DATE,
    APROBADO VARCHAR(10),
    IMPORTEECONOMICO FLOAT,
    FECHAINICIO DATE,
    FECHAFINALIZACION DATE,
    DURACIONMESES INT,
    NUMEROENTRADAREGISTRO VARCHAR(50),
    FOREIGN KEY (CONVOCATORIAID) REFERENCES CONVOCATORIAS(CONVOCATORIAID)
);

-- Tabla DRUP_EMP (Tabla superior que une las tablas importantes)
CREATE TABLE DRUP_EMP (
    DRUP_EMP_ID INT PRIMARY KEY,
    ConvocatoriaID INT,
    SolicitudID INT,
    InvestigadorID INT,
    GrupoID INT,
	ORGANISMOID INT ,
	DEPARTAMENTOID INT ,
    FOREIGN KEY (ConvocatoriaID) REFERENCES Convocatorias(ConvocatoriaID),
    FOREIGN KEY (SolicitudID) REFERENCES Solicitudes(SolicitudID),
    FOREIGN KEY (InvestigadorID) REFERENCES Investigadores(InvestigadorID),
    FOREIGN KEY (GrupoID) REFERENCES GruposInvestigacion(GrupoID),
	FOREIGN KEY (ORGANISMOID) REFERENCES ORGANISMOS(ORGANISMOID),
	FOREIGN KEY (DEPARTAMENTOID) REFERENCES DEPARTAMENTOS(DEPARTAMENTOID)

);

