CREATE OR REPLACE FUNCTION get_emp_name(emp_number NUMBER)
RETURN VARCHAR2 IS emp_name VARCHAR2(100);

BEGIN 
    SELECT ename INTO emp_name
    FROM emp
    WHERE empno = emp_number;

    RETURN emp_name;
END;
/

CREATE OR REPLACE FUNCTION get_emp_job(emp_number NUMBER) RETURN VARCHAR2 IS emp_job VARCHAR2(100);
BEGIN 
    SELECT job INTO emp_job
    FROM emp
    WHERE empno = emp_number;

    RETURN emp_job;
END;
/

CREATE OR REPLACE FUNCTION get_depart_name(emp_number NUMBER) RETURN VARCHAR2 IS emp_depart VARCHAR2(100);
BEGIN 
    SELECT dname INTO emp_depart 
    FROM dept 
    JOIN emp ON emp.deptno = dept.deptno
    WHERE emp.empno = emp_number;

    RETURN emp_depart;
END;
/

DECLARE 
    empno NUMBER;
    emp_name VARCHAR2(100);
    emp_job VARCHAR2(100);
    emp_depart VARCHAR2(100);
    
BEGIN
    empno := 7369;
    emp_name := get_emp_name(empno);
    emp_job := get_emp_job(empno);
    emp_depart := get_depart_name(empno);
    DBMS_OUTPUT.PUT_LINE(
        'Employee name is ' || emp_name ||
        ' AND job is ' || emp_job ||  
        ' AND Departement is ' || emp_depart
    );

EXCEPTION
    WHEN OTHERS THEN 
        DBMS_OUTPUT.PUT_LINE('ERROR : ' || SQLERRM);
END;
/





-- DECLARE 
--     emp_name VARCHAR2(100);

--     FUNCTION get_emp_name(emp_number NUMBER) RETURN VARCHAR2 IS 
--         emp_name VARCHAR2(100);
--     BEGIN 
--         SELECT ename INTO emp_name
--         FROM emp
--         WHERE empno = emp_number;

--         RETURN emp_name;
--     END get_emp_name;
-- BEGIN
--     emp_name := get_emp_name(7369);
--     DBMS_OUTPUT.PUT_LINE(
--         'Emp ' || emp_name 
--     );
-- EXCEPTION
--     WHEN OTHERS THEN 
--         DBMS_OUTPUT.PUT_LINE('ERROR : ' || SQLERRM);
-- END;
-- /
