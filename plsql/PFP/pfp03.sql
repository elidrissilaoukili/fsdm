CREATE OR REPLACE FUNCTION get_depart_name(depart_number NUMBER)
    RETURN VARCHAR2 IS 
    depart_name VARCHAR2(100);

BEGIN
    SELECT dname INTO depart_name
    FROM dept
    WHERE deptno = depart_number;
    RETURN depart_name;

EXCEPTION
    WHEN NO_DATA_FOUND THEN
        RETURN NULL;
    WHEN OTHERS THEN
        RAISE;
END;
/

CREATE OR REPLACE PROCEDURE display_employees IS 
    CURSOR employee_cursor IS 
        SELECT e.ename, e.job, e.deptno
        FROM emp e 
        JOIN dept d ON e.deptno = d.deptno;

    depart_name VARCHAR2(100);

BEGIN 
    FOR employee_record IN employee_cursor LOOP
        depart_name := get_depart_name(employee_record.deptno);
        
        DBMS_OUTPUT.PUT_LINE(
            'Employee ' || employee_record.ename || 
            ' Profession ' || employee_record.job || 
            ' in department of ' || depart_name
        );
    END LOOP;
    
EXCEPTION
    WHEN OTHERS THEN 
        DBMS_OUTPUT.PUT_LINE('ERROR : ' || SQLERRM);
END;
/

SET SERVEROUTPUT ON;
BEGIN 
    display_employees; 
END;
/
