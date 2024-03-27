Rem Copyright (c) 2016 by Oracle Corporation Rem Rem You may not use the identified files
except
	in compliance with The MIT Rem License (the "License.") Rem Rem You may obtain a copy of the License at Rem https: / / github.com / oracle / Oracle.NET / blob / master / LICENSE Rem Rem Unless required by applicable law
	or agreed to in writing,
	software Rem distributed under the License is distributed on an "AS IS" BASIS,
	WITHOUT Rem WARRANTIES
	OR CONDITIONS OF ANY KIND,
	either express
	or implied.Rem Rem See the License for the specific language governing permissions
	and Rem limitations under the License.Rem Rem NAME REM SMI.sql Rem Rem DESCRIPTION Rem SMI is a database user whose schema is used for Oracle code demonstrations Rem Be sure to replace < PASSWORD > on lines 30
	and 33 with your preferred password.
SET
	TERMOUT ON
SET
	ECHO On rem CONGDON Invoked in RDBMS at build time.29 - DEC -1988 rem OATES: Created: 16 - Feb -83 GRANT CONNECT,
	RESOURCE,
	UNLIMITED TABLESPACE TO SMI IDENTIFIED BY 2024;

ALTER USER SMI DEFAULT TABLESPACE USERS;

ALTER USER SMI TEMPORARY TABLESPACE TEMP;

CONNECT SMI / 2024 DROP TABLE DEPT;

CREATE TABLE DEPT (
	DEPTNO NUMBER(2) CONSTRAINT PK_DEPT PRIMARY KEY,
	DNAME VARCHAR2(14),
	LOC VARCHAR2(13)
);

DROP TABLE EMP;

CREATE TABLE EMP (
	EMPNO NUMBER(4) CONSTRAINT PK_EMP PRIMARY KEY,
	ENAME VARCHAR2(10),
	JOB VARCHAR2(9),
	MGR NUMBER(4),
	HIREDATE DATE,
	SAL NUMBER(7, 2),
	COMM NUMBER(7, 2),
	DEPTNO NUMBER(2) CONSTRAINT FK_DEPTNO REFERENCES DEPT
);

INSERT INTO
	DEPT
VALUES
	(10, 'ACCOUNTING', 'NEW YORK');

INSERT INTO
	DEPT
VALUES
	(20, 'RESEARCH', 'DALLAS');

INSERT INTO
	DEPT
VALUES
	(30, 'SALES', 'CHICAGO');

INSERT INTO
	DEPT
VALUES
	(40, 'OPERATIONS', 'BOSTON');

INSERT INTO
	EMP
VALUES
	(
		7369,
		'SMITH',
		'CLERK',
		7902,
		to_date('17-12-1980', 'dd-mm-yyyy'),
		800,
		NULL,
		20
	);

INSERT INTO
	EMP
VALUES
	(
		7499,
		'ALLEN',
		'SALESMAN',
		7698,
		to_date('20-2-1981', 'dd-mm-yyyy'),
		1600,
		300,
		30
	);

INSERT INTO
	EMP
VALUES
	(
		7521,
		'WARD',
		'SALESMAN',
		7698,
		to_date('22-2-1981', 'dd-mm-yyyy'),
		1250,
		500,
		30
	);

INSERT INTO
	EMP
VALUES
	(
		7566,
		'JONES',
		'MANAGER',
		7839,
		to_date('2-4-1981', 'dd-mm-yyyy'),
		2975,
		NULL,
		20
	);

INSERT INTO
	EMP
VALUES
	(
		7654,
		'MARTIN',
		'SALESMAN',
		7698,
		to_date('28-9-1981', 'dd-mm-yyyy'),
		1250,
		1400,
		30
	);

INSERT INTO
	EMP
VALUES
	(
		7698,
		'BLAKE',
		'MANAGER',
		7839,
		to_date('1-5-1981', 'dd-mm-yyyy'),
		2850,
		NULL,
		30
	);

INSERT INTO
	EMP
VALUES
	(
		7782,
		'CLARK',
		'MANAGER',
		7839,
		to_date('9-6-1981', 'dd-mm-yyyy'),
		2450,
		NULL,
		10
	);

INSERT INTO
	EMP
VALUES
	(
		7788,
		'SMI',
		'ANALYST',
		7566,
		to_date('13-JUL-87') -85,
		3000,
		NULL,
		20
	);

INSERT INTO
	EMP
VALUES
	(
		7839,
		'KING',
		'PRESIDENT',
		NULL,
		to_date('17-11-1981', 'dd-mm-yyyy'),
		5000,
		NULL,
		10
	);

INSERT INTO
	EMP
VALUES
	(
		7844,
		'TURNER',
		'SALESMAN',
		7698,
		to_date('8-9-1981', 'dd-mm-yyyy'),
		1500,
		0,
		30
	);

INSERT INTO
	EMP
VALUES
	(
		7876,
		'ADAMS',
		'CLERK',
		7788,
		to_date('13-JUL-87') -51,
		1100,
		NULL,
		20
	);

INSERT INTO
	EMP
VALUES
	(
		7900,
		'JAMES',
		'CLERK',
		7698,
		to_date('3-12-1981', 'dd-mm-yyyy'),
		950,
		NULL,
		30
	);

INSERT INTO
	EMP
VALUES
	(
		7902,
		'FORD',
		'ANALYST',
		7566,
		to_date('3-12-1981', 'dd-mm-yyyy'),
		3000,
		NULL,
		20
	);

INSERT INTO
	EMP
VALUES
	(
		7934,
		'MILLER',
		'CLERK',
		7782,
		to_date('23-1-1982', 'dd-mm-yyyy'),
		1300,
		NULL,
		10
	);

DROP TABLE SALGRADE;

CREATE TABLE SALGRADE (GRADE NUMBER, LOSAL NUMBER, HISAL NUMBER);

INSERT INTO
	SALGRADE
VALUES
	(1, 700, 1200);

INSERT INTO
	SALGRADE
VALUES
	(2, 1201, 1400);

INSERT INTO
	SALGRADE
VALUES
	(3, 1401, 2000);

INSERT INTO
	SALGRADE
VALUES
	(4, 2001, 3000);

INSERT INTO
	SALGRADE
VALUES
	(5, 3001, 9999);

DROP TABLE BUDGET;

CREATE TABLE BUDGET (
	NUM_OPERATION NUMBER (4, 2) PRIMARY KEY,
	NOM_OPERATION VARCHAR2 (15),
	CATEGORIE VARCHAR2 (10) NOT NULL CHECK(CATEGORIE iN ('Revenu', 'Depense')),
	DATE_OPERATION DATE,
	MONTANT NUMBER (6, 2),
	SOLDE NUMBER (7, 2)
);

INSERT INTO
	BUDGET
VALUES
	(
		1,
		'Divers',
		'Depense',
		TO_DATE(
			TO_DATE('15/10/2001', 'DD/MM/YYYY'),
			'DD/MM/YYYY'
		),
		220,
		5500
	);

INSERT INTO
	BUDGET
VALUES
	(
		2,
		'Courses',
		'Depense',
		TO_DATE('16/10/2001', 'DD/MM/YYYY'),
		455,
		5045
	);

INSERT INTO
	BUDGET
VALUES
	(
		3,
		'Virement',
		'Depense',
		TO_DATE('26/10/2001', 'DD/MM/YYYY'),
		2000,
		3045
	);

INSERT INTO
	BUDGET
VALUES
	(
		4,
		'Salaire',
		'Revenu',
		TO_DATE('27/10/2001', 'DD/MM/YYYY'),
		8500,
		11545
	);

INSERT INTO
	BUDGET
VALUES
	(
		5,
		'Cadeau',
		'Depense',
		TO_DATE('29/10/2001', 'DD/MM/YYYY'),
		350,
		11195
	);

INSERT INTO
	BUDGET
VALUES
	(
		6,
		'Loyer',
		'Depense',
		TO_DATE('03/11/2001', 'DD/MM/YYYY'),
		3000,
		8195
	);

INSERT INTO
	BUDGET
VALUES
	(
		7,
		'Remboursement',
		'Depense',
		TO_DATE('10/11/2001', 'DD/MM/YYYY'),
		2500,
		5695
	);

INSERT INTO
	BUDGET
VALUES
	(
		8,
		'Courses',
		'Depense',
		TO_DATE('15/11/2001', 'DD/MM/YYYY'),
		670,
		5025
	);

INSERT INTO
	BUDGET
VALUES
	(
		9,
		'Divers',
		'Depense',
		TO_DATE('20/11/2001', 'DD/MM/YYYY'),
		300,
		4725
	);

INSERT INTO
	BUDGET
VALUES
	(
		10,
		'Sortie',
		'Depense',
		TO_DATE('24/11/2001', 'DD/MM/YYYY'),
		600,
		4125
	);

INSERT INTO
	BUDGET
VALUES
	(
		11,
		'Courses',
		'Depense',
		TO_DATE('26/11/2001', 'DD/MM/YYYY'),
		555,
		3570
	);

INSERT INTO
	BUDGET
VALUES
	(
		12,
		'Virement',
		'Depense',
		TO_DATE('26/11/2001', 'DD/MM/YYYY'),
		2000,
		1570
	);

INSERT INTO
	BUDGET
VALUES
	(
		13,
		'Salaire',
		'Revenu',
		TO_DATE('27/11/2001', 'DD/MM/YYYY'),
		8500,
		10070
	);

INSERT INTO
	BUDGET
VALUES
	(
		14,
		'Facture',
		'Depense',
		TO_DATE('02/12/2001', 'DD/MM/YYYY'),
		1000,
		9070
	);

INSERT INTO
	BUDGET
VALUES
	(
		15,
		'Courses',
		'Depense',
		TO_DATE('05/12/2001', 'DD/MM/YYYY'),
		750,
		8320
	);

INSERT INTO
	BUDGET
VALUES
	(
		16,
		'Loyer',
		'Depense',
		TO_DATE('06/12/2001', 'DD/MM/YYYY'),
		3000,
		5320
	);

INSERT INTO
	BUDGET
VALUES
	(
		17,
		'Cadeau',
		'Depense',
		TO_DATE('10/12/2001', 'DD/MM/YYYY'),
		500,
		4820
	);

INSERT INTO
	BUDGET
VALUES
	(
		18,
		'Cadeau',
		'Depense',
		TO_DATE('11/12/2001', 'DD/MM/YYYY'),
		700,
		4120
	);

INSERT INTO
	BUDGET
VALUES
	(
		19,
		'Sortie',
		'Depense',
		TO_DATE('15/12/2001', 'DD/MM/YYYY'),
		500,
		3620
	);

INSERT INTO
	BUDGET
VALUES
	(
		20,
		'Courses',
		'Depense',
		TO_DATE('19/12/2001', 'DD/MM/YYYY'),
		660,
		2960
	);

INSERT INTO
	BUDGET
VALUES
	(
		21,
		'Cadeau',
		'Depense',
		TO_DATE('21/12/2001', 'DD/MM/YYYY'),
		350,
		2610
	);

INSERT INTO
	BUDGET
VALUES
	(
		22,
		'Facture',
		'Depense',
		TO_DATE('22/12/2001', 'DD/MM/YYYY'),
		550,
		2060
	);

INSERT INTO
	BUDGET
VALUES
	(
		23,
		'Virement',
		'Depense',
		TO_DATE('26/12/2001', 'DD/MM/YYYY'),
		2000,
		60
	);

INSERT INTO
	BUDGET
VALUES
	(
		24,
		'Salaire',
		'Revenu',
		TO_DATE('27/12/2001', 'DD/MM/YYYY'),
		8500,
		8560
	);

INSERT INTO
	BUDGET
VALUES
	(
		25,
		'Courses',
		'Depense',
		TO_DATE('30/12/2001', 'DD/MM/YYYY'),
		1100,
		7460
	);

INSERT INTO
	BUDGET
VALUES
	(
		26,
		'Cadeau',
		'Revenu',
		TO_DATE('03/01/2002', 'DD/MM/YYYY'),
		750,
		8210
	);

INSERT INTO
	BUDGET
VALUES
	(
		27,
		'Sortie',
		'Depense',
		TO_DATE('04/01/2002', 'DD/MM/YYYY'),
		460,
		7750
	);

INSERT INTO
	BUDGET
VALUES
	(
		28,
		'Courses',
		'Depense',
		TO_DATE('06/01/2002', 'DD/MM/YYYY'),
		630,
		7120
	);

INSERT INTO
	BUDGET
VALUES
	(
		29,
		'Divers',
		'Depense',
		TO_DATE('10/01/2002', 'DD/MM/YYYY'),
		700,
		6420
	);

INSERT INTO
	BUDGET
VALUES
	(
		30,
		'Facture',
		'Depense',
		TO_DATE('13/01/2002', 'DD/MM/YYYY'),
		890,
		5530
	);

DROP TABLE ETUDIANT;

CREATE TABLE ETUDIANT (
	NUM_ETUDIANT NUMBER (5) PRIMARY KEY,
	NOM_ETUDIANT VARCHAR2 (20),
	PRENOM_ETUDIANT VARCHAR2 (20),
	Filiere VARCHAR2 (20),
	AGE NUMBER (2)
);

INSERT INTO
	ETUDIANT
VALUES
	(1, 'ETUDIANT_1', 'ETUDIANT_1', 'SMI', 20);

INSERT INTO
	ETUDIANT
VALUES
	(2, 'ETUDIANT_2', 'ETUDIANT_2', 'SMI', 25);

INSERT INTO
	ETUDIANT
VALUES
	(3, 'ETUDIANT_3', 'ETUDIANT_3', 'SMP', 22);

INSERT INTO
	ETUDIANT
VALUES
	(4, 'ETUDIANT_4', 'ETUDIANT_4', 'SMA', 21);

INSERT INTO
	ETUDIANT
VALUES
	(5, 'ETUDIANT_5', 'ETUDIANT_5', 'SMA', 24);

INSERT INTO
	ETUDIANT
VALUES
	(6, 'ETUDIANT_6', 'ETUDIANT_6', 'SMI', 30);

DROP TABLE COMMANDE;

DROP TABLE PRODUIT;

CREATE TABLE PRODUIT (
	NO_PROD INTEGER NOT NULL PRIMARY KEY,
	DESIGN_PROD VARCHAR(50),
	PRIX_UNITE FLOAT NOT NULL,
	STOCK INTEGER DEFAULT 0
);

INSERT INTO
	PRODUIT
VALUES
	(1, 'RAZER BLADE 16', 30000, 32);

INSERT INTO
	PRODUIT
VALUES
	(2, 'NVIDIA GEFORCE RTX 4090', 15000, 44);

INSERT INTO
	PRODUIT
VALUES
	(3, 'ASUS ROG STRIX G15', 25000, 25);

INSERT INTO
	PRODUIT
VALUES
	(4, 'MSI GEFORCE RTX 3080', 20000, 65);

CREATE TABLE COMMANDE (
	NO_CMD INTEGER NOT NULL PRIMARY KEY,
	NO_PROD INTEGER NOT NULL,
	DATE_CMD DATE,
	QUANTITE INTEGER DEFAULT 0,
	MONTANT FLOAT DEFAULT 0,
	FOREIGN KEY (NO_PROD) REFERENCES PRODUIT(NO_PROD)
);

COMMIT;

SET
	TERMOUT ON
SET
	ECHO ON