DROP DATABASE IF EXISTS entrataUscita;
CREATE DATABASE entrataUscita;
USE entrataUscita;
CREATE TABLE passagio (
    ID INTEGER PRIMARY KEY AUTO_INCREMENT,
    NOME VARCHAR(255),
    COGNOME VARCHAR(255),
    MOTIVO VARCHAR(255),
    PERSONA_DA_VISITARE VARCHAR(255),
    DATAOGGI DATE ,
    FIRMA_PATH VARCHAR(255),
    ORAENTRATA DATETIME ,
    ORAUSCITA DATETIME  
 
);
CREATE TABLE UTENTE (
    ID INTEGER PRIMARY KEY AUTO_INCREMENT,
    USERNAME VARCHAR(255),
    PASSWORD VARCHAR(255),
    NOME VARCHAR(255),
    COGNOME VARCHAR(255)
);
INSERT INTO UTENTE (USERNAME, PASSWORD, NOME, COGNOME) VALUES ('silv', '1a01b60f1adf59e6cc9349e49d68d6b9', 'Silvia', 'Arnoldi');