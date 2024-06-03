-- Drop the VOL table if it exists
BEGIN
    EXECUTE IMMEDIATE 'DROP TABLE VOL CASCADE CONSTRAINTS';
EXCEPTION
    WHEN OTHERS THEN
        IF SQLCODE != -942 THEN
            RAISE;
        END IF;
END;
/

-- Drop the PILOTE table if it exists
BEGIN
    EXECUTE IMMEDIATE 'DROP TABLE PILOTE CASCADE CONSTRAINTS';
EXCEPTION
    WHEN OTHERS THEN
        IF SQLCODE != -942 THEN
            RAISE;
        END IF;
END;
/

-- Drop the EMPLOYEE table if it exists
BEGIN
    EXECUTE IMMEDIATE 'DROP TABLE EMPLOYEE CASCADE CONSTRAINTS';
EXCEPTION
    WHEN OTHERS THEN
        IF SQLCODE != -942 THEN
            RAISE;
        END IF;
END;
/

-- Drop the History table if it exists
BEGIN
    EXECUTE IMMEDIATE 'DROP TABLE History CASCADE CONSTRAINTS';
EXCEPTION
    WHEN OTHERS THEN
        IF SQLCODE != -942 THEN
            RAISE;
        END IF;
END;
/

-- Create the PILOTE table
CREATE TABLE PILOTE (
    PlNum NUMBER PRIMARY KEY,
    PlNom VARCHAR2(50),
    PlPrenom VARCHAR2(50),
    Ville VARCHAR2(50),
    Salaire NUMBER(10, 2),
    NbAnnees NUMBER
);

-- Create the VOL table
CREATE TABLE VOL (
    Num_vol NUMBER PRIMARY KEY,
    PlNum NUMBER,
    NumVol VARCHAR2(50),
    NbH NUMBER,
    FOREIGN KEY (PlNum) REFERENCES PILOTE(PlNum)
);

-- Create the EMPLOYEE table
CREATE TABLE customers (
    ID NUMBER PRIMARY KEY,
    NAME VARCHAR2(50),
    AGE NUMBER,
    ADDRESS VARCHAR2(100),
    SALARY NUMBER(10, 2)
);

CREATE TABLE History (
    PlNum NUMBER,
    operation_date DATE,
    operation_type VARCHAR2(10)
);

-- Insert data into the PILOTE table
INSERT INTO PILOTE (PlNum, PlNom, PlPrenom, Ville, Salaire, NbAnnees) VALUES (1, 'Smith', 'John', 'New York', 75000.00, 10);
INSERT INTO PILOTE (PlNum, PlNom, PlPrenom, Ville, Salaire, NbAnnees) VALUES (2, 'Doe', 'Jane', 'Los Angeles', 68000.00, 8);
INSERT INTO PILOTE (PlNum, PlNom, PlPrenom, Ville, Salaire, NbAnnees) VALUES (3, 'Brown', 'Bob', 'Chicago', 72000.00, 12);

-- Insert data into the VOL table
INSERT INTO VOL (Num_vol, PlNum, NumVol, NbH) VALUES (1001, 1, 'NY100', 200);
INSERT INTO VOL (Num_vol, PlNum, NumVol, NbH) VALUES (1002, 1, 'NY101', 350);
INSERT INTO VOL (Num_vol, PlNum, NumVol, NbH) VALUES (1003, 2, 'LA200', 100);
INSERT INTO VOL (Num_vol, PlNum, NumVol, NbH) VALUES (1004, 3, 'CH300', 600);
INSERT INTO VOL (Num_vol, PlNum, NumVol, NbH) VALUES (1005, 3, 'CH301', 50);

-- Insert data into the customers table
INSERT INTO customers (ID, NAME, AGE, ADDRESS, SALARY) VALUES (1, 'Ramesh', 32, 'Ahmedabad', 3000.00);
INSERT INTO customers (ID, NAME, AGE, ADDRESS, SALARY) VALUES (2, 'Khilan', 25, 'Delhi', 3000.00);
INSERT INTO customers (ID, NAME, AGE, ADDRESS, SALARY) VALUES (3, 'Kaushik', 23, 'Kota', 3000.00);
INSERT INTO customers (ID, NAME, AGE, ADDRESS, SALARY) VALUES (4, 'Chaitali', 25, 'Mumbai', 7500.00);
INSERT INTO customers (ID, NAME, AGE, ADDRESS, SALARY) VALUES (5, 'Hardik', 27, 'Bhopal', 9500.00);
INSERT INTO customers (ID, NAME, AGE, ADDRESS, SALARY) VALUES (6, 'Komal', 22, 'MP', 5500.00);
