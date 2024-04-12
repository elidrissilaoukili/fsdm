CREATE OR REPLACE FUNCTION find_max_sal(depart_number NUMBER) RETURN NUMBER IS 
    max_sal NUMBER;
BEGIN
    SELECT MAX(sal) INTO max_sal
    FROM emp
    WHERE deptno = depart_number;

    RETURN max_sal;

EXCEPTION
    WHEN NO_DATA_FOUND THEN 
        RETURN NULL;
    WHEN OTHERS THEN 
        RETURN NULL;
END;
/ 

DECLARE 
    max_sal NUMBER;
BEGIN 
    max_sal := find_max_sal(10);
    DBMS_OUTPUT.PUT_LINE('Max salary is: ' || max_sal);
END;
/



-- SELECT find_max_sal(20) AS salaire_max
-- FROM dual;
