CREATE OR REPLACE FUNCTION get_chef_name(emp_number NUMBER) 
RETURN VARCHAR2 IS chef_name VARCHAR2(100);
chef_number NUMBER;

BEGIN
    SELECT mgr INTO chef_number
    FROM emp
    WHERE empno = emp_number;

    IF chef_number IS NULL THEN
        RETURN ' **** "THIS IS THE MANAGER" ';
    END IF;

    SELECT ename INTO chef_name
    FROM emp
    WHERE empno = chef_number;
    
    RETURN chef_name;

END;
/

DECLARE
    empno NUMBER;
    chef_name VARCHAR2(100);

BEGIN
    empno := 7839;
    chef_name := get_chef_name(empno);
    DBMS_OUTPUT.PUT_LINE(
        'BOSS name is ' || chef_name 
    );

END;
/
