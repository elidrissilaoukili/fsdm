-- C. Procédures, FoncƟons et Packages
-- QuesƟon 1
CREATE
OR REPLACE FUNCTION get_nom_departement(p_numero_departement NUMBER) 
RETURN VARCHAR2 IS v_nom_departement VARCHAR2(100);

BEGIN
SELECT
    dname INTO v_nom_departement
FROM
    dept
WHERE
    deptno = p_numero_departement;

RETURN v_nom_departement;

EXCEPTION -- ‐‐ Retourne NULL si aucun département correspondant n'est trouvé
WHEN NO_DATA_FOUND THEN RETURN NULL;

WHEN OTHERS THEN RAISE;

END;

/
SELECT
    get_nom_departement(10) AS nom_departement
FROM
    dual;

-- QuesƟon 2
CREATE
OR REPLACE PROCEDURE update_nom_departement(
    p_numero_departement NUMBER,
    p_nom_departement VARCHAR2
) IS BEGIN
UPDATE
    dept
SET
    dname = p_nom_departement
WHERE
    deptno = p_numero_departement;

COMMIT;

DBMS_OUTPUT.PUT_LINE('Nom du département mis à jour avec succès.');

EXCEPTION
WHEN NO_DATA_FOUND THEN DBMS_OUTPUT.PUT_LINE('Aucun département trouvé avec ce numéro.');

WHEN OTHERS THEN DBMS_OUTPUT.PUT_LINE('Erreur : ' || SQLERRM);

END;

/ BEGIN update_nom_departement(10, 'Paris');

END;

/ -- QuesƟon 3
CREATE
OR REPLACE PROCEDURE afficher_employes IS CURSOR employe_cursor IS
SELECT
    e.ename,
    e.job,
    e.deptno
FROM
    emp e
    JOIN dept d ON e.deptno = d.deptno;

v_nom_departement VARCHAR2(100);

BEGIN FOR employe_record IN employe_cursor LOOP v_nom_departement := get_nom_departement(employe_record.deptno);

DBMS_OUTPUT.PUT_LINE(
    'L''employé ' || employe_record.ename || ' a la profession ' || employe_record.job || ' dans le département ' || v_nom_departement
);
END LOOP;
EXCEPTION
WHEN OTHERS THEN DBMS_OUTPUT.PUT_LINE('Erreur : ' || SQLERRM);
END;
/
SET
    SERVEROUTPUT ON;
BEGIN afficher_employes;
END;

/ -- QuesƟon 4
CREATE
OR REPLACE FUNCTION get_chef_nom(p_empno NUMBER) RETURN VARCHAR2 IS v_chef_empno NUMBER;

v_chef_nom VARCHAR2(100);

BEGIN -- ‐‐ Obtenez le numéro de chef de l'employé
SELECT
    mgr INTO v_chef_empno
FROM
    emp
WHERE
    empno = p_empno;

-- ‐‐ Si l'employé est le chef, retournez "Aucun"
IF v_chef_empno IS NULL THEN RETURN 'Aucun';

END IF;

-- ‐‐ Si ce n'est pas le chef, obtenez le nom du chef
v_chef_nom := afficher_nom_employe(v_chef_empno);

RETURN v_chef_nom;

EXCEPTION
WHEN NO_DATA_FOUND THEN RETURN 'Aucun';

WHEN OTHERS THEN RETURN NULL;

END;

/ DECLARE v_chef_nom VARCHAR2(100);

BEGIN -- ‐‐ Remplacez le numéro d'employé par celui que vous souhaitez vérifier
v_chef_nom := get_chef_nom(7902);

DBMS_OUTPUT.PUT_LINE('Nom du chef: ' || v_chef_nom);

END;

/ -- QuesƟon 5
CREATE
OR REPLACE PROCEDURE augmenter_salaires IS BEGIN -- Augmenter les salaires pour le grade 1 et grade 2 (10 %)
UPDATE
    emp
SET
    sal = sal * 1.1
WHERE
    job IN ('MANAGER', 'GRADE 2');

-- Augmenter les salaires pour le grade 3 (15 %)
UPDATE
    emp
SET
    sal = sal * 1.15
WHERE
    job = 'GRADE 3';

-- Augmenter les salaires pour le grade 4 et grade 5 (20 %)
UPDATE
    emp
SET
    sal = sal * 1.20
WHERE
    job IN ('GRADE 4', 'GRADE 5');

COMMIT;

DBMS_OUTPUT.PUT_LINE('Les salaires ont été augmentés avec succès.');

EXCEPTION
WHEN OTHERS THEN DBMS_OUTPUT.PUT_LINE('Erreur : ' || SQLERRM);

END;

/ BEGIN augmenter_salaires;

END;

/ -- QuesƟon 6
CREATE
OR REPLACE FUNCTION salaire_max_departement(p_deptno NUMBER) RETURN NUMBER IS v_max_salary NUMBER;

BEGIN
SELECT
    MAX(sal) INTO v_max_salary
FROM
    emp
WHERE
    deptno = p_deptno;

RETURN v_max_salary;

EXCEPTION
WHEN NO_DATA_FOUND THEN RETURN NULL;

WHEN OTHERS THEN RETURN NULL;

END;

/
SELECT
    salaire_max_departement(20) AS salaire_max
FROM
    dual;

ou DECLARE v_salaire_max NUMBER;

BEGIN v_salaire_max := salaire_max_departement(20);

DBMS_OUTPUT.PUT_LINE(
    'Le salaire maximum dans le département est : ' || v_salaire_max
);

END;

/ -- QuesƟon 7
CREATE
OR REPLACE PACKAGE gesƟon_emp AS FUNCTION afficher_nom_employe(p_empno NUMBER) RETURN VARCHAR2;

FUNCTION get_chef_nom(p_empno NUMBER) RETURN VARCHAR2;

PROCEDURE augmenter_salaires;

FUNCTION salaire_max_departement(p_deptno NUMBER) RETURN NUMBER;

-- -- Ajoutez d 'autres foncƟons ou procédures ici si nécessaire
END gesƟon_emp;

/ CREATE
OR REPLACE PACKAGE BODY gesƟon_emp AS FUNCTION afficher_nom_employe(p_empno NUMBER) RETURN VARCHAR2 IS v_nom_employe VARCHAR2(100);

v_profession VARCHAR2(100);

v_nom_departement VARCHAR2(100);

BEGIN --Votre code pour la foncƟon afficher_nom_employe
END afficher_nom_employe;

FUNCTION get_chef_nom(p_empno NUMBER) RETURN VARCHAR2 IS v_chef_empno NUMBER;

v_chef_nom VARCHAR2(100);

BEGIN --Votre code pour la foncƟon get_chef_nom
END get_chef_nom;

PROCEDURE augmenter_salaires IS BEGIN -- Votre code pour la procédure augmenter_salaires
END augmenter_salaires;

FUNCTION salaire_max_departement(p_deptno NUMBER) RETURN NUMBER IS v_max_salary NUMBER;

BEGIN -- Votre code pour la foncƟon salaire_max_departement
END salaire_max_departement;

-- -- Ajoutez d ' autres foncƟons ou procédures ici si nécessaire
END gesƟon_emp;

/ --Exemple d ' uƟlisaƟon du package gesƟon_emp DECLARE v_nom VARCHAR2(100);
v_chef_nom VARCHAR2(100);

v_max_salary NUMBER;

BEGIN v_nom := gesƟon_emp.afficher_nom_employe(7369);

DBMS_OUTPUT.PUT_LINE(' Nom de l '' employé: ' || v_nom);

v_chef_nom := gesƟon_emp.get_chef_nom(7369);

DBMS_OUTPUT.PUT_LINE(' Nom du chef: ' || v_chef_nom);

gesƟon_emp.augmenter_salaires;

DBMS_OUTPUT.PUT_LINE(' Salaires augmentés avec succès.');

v_max_salary := gesƟon_emp.salaire_max_departement(10);

DBMS_OUTPUT.PUT_LINE(
    ' Le salaire maximum dans le département est: ' || v_max_salary
);

END;

/ DECLARE v_max_salary NUMBER;

BEGIN -- Remplacez le numéro de département par celui que vous souhaitez vérifier v_max_salary := salaire_max_departement(10);
DBMS_OUTPUT.PUT_LINE(
    ' Le salaire maximum dans ce département est: ' || v_max_salary
);

END;

/