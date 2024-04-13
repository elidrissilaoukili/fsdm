CREATE OR REPLACE PACKAGE BODY manage_emp AS 
    FUNCTION afficher_nom_employe(p_empno NUMBER) RETURN VARCHAR2 IS 
        v_nom_employe VARCHAR2(100);
    BEGIN 
        -- Implementation code to fetch employee name
        -- For example:
        SELECT ename INTO v_nom_employe FROM emp WHERE empno = p_empno;
        RETUùRN v_nom_employe;
    END afficher_nom_employe;

    FUNCTION get_chef_nom(p_empno NUMBER) RETURN VARCHAR2 IS 
        v_chef_nom VARCHAR2(100);
    BEGIN 
        -- Implementation code to fetch the name of the employee's manager
        -- For example:
        SELECT ename INTO v_chef_nom FROM emp WHERE empno = (SELECT mgr FROM emp WHERE empno = p_empno);
        RETURN v_chef_nom;
    END get_chef_nom;

    PROCEDURE augmenter_salaires IS 
    BEGIN 
        -- Implementation code to increase salaries
        -- For example:
        UPDATE emp SET sal = sal * 1.1;
    END augmenter_salaires;

    FUNCTION salaire_max_departement(p_deptno NUMBER) RETURN NUMBER IS 
        v_max_salary NUMBER;
    BEGIN 
        -- Implementation code to find the maximum salary in the department
        -- For example:
        SELECT MAX(sal) INTO v_max_salary FROM emp WHERE deptno = p_deptno;
        RETURN v_max_salary;
    END salaire_max_departement;
END manage_emp;
/
