CREATE OR REPLACE 
PACKAGE manage_emp AS FUNCTION display_emp_name(emp_number NUMBER) RETURN VARCHAR2;
FUNCTION get_chef_nom(emp_number NUMBER) RETURN VARCHAR2;
PROCEDURE increase_sal;
FUNCTION find_max_sal(depart_number NUMBER) RETURN NUMBER;

END manage_emp;
/ 

CREATE
OR REPLACE PACKAGE BODY manage_emp AS FUNCTION display_emp_name(emp_number NUMBER) RETURN VARCHAR2 IS v_nom_employe VARCHAR2(100);
v_profession VARCHAR2(100);
v_nom_departement VARCHAR2(100);
BEGIN 
END display_emp_name;

FUNCTION get_chef_nom(emp_number NUMBER) RETURN VARCHAR2 IS v_chef_empno NUMBER;
v_chef_nom VARCHAR2(100);
BEGIN --Votre code pour la foncƟon get_chef_nom
END get_chef_nom;
PROCEDURE increase_sal IS BEGIN -- Votre code pour la procédure increase_sal
END increase_sal;
FUNCTION find_max_sal(depart_number NUMBER) RETURN NUMBER IS v_max_salary NUMBER;
BEGIN
END find_max_sal;
END manage_emp;
/ 

v_chef_nom VARCHAR2(100);
v_max_salary NUMBER;
BEGIN v_nom := manage_emp.display_emp_name(7369);
DBMS_OUTPUT.PUT_LINE(' Employee name: ' || v_nom);
v_chef_nom := manage_emp.get_chef_nom(7369);
DBMS_OUTPUT.PUT_LINE(' Nom du chef: ' || v_chef_nom);
manage_emp.increase_sal;
DBMS_OUTPUT.PUT_LINE(' Salaires augmentés avec succès.');
v_max_salary := manage_emp.find_max_sal(10);
DBMS_OUTPUT.PUT_LINE(' Le salaire maximum dans le département est: ' || v_max_salary);
END;
/

DECLARE v_max_salary NUMBER;
BEGIN 
DBMS_OUTPUT.PUT_LINE(' Le salaire maximum dans ce département est: ' || v_max_salary);
END;
/