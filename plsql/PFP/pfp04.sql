CREATE OR REPLACE FUNCTION get_chef_name(p_empno NUMBER) 
    RETURN VARCHAR2 
IS 
    v_chef_name VARCHAR2(100);
    v_chef_empno NUMBER;    
BEGIN 
    SELECT mgr INTO v_chef_empno
    FROM emp
    WHERE empno = p_empno;

    IF v_chef_empno IS NULL THEN 
        RETURN 'NULL';
    END IF;

    SELECT ename INTO v_chef_name
    FROM emp
    WHERE empno = v_chef_empno;
    
    RETURN v_chef_name;

EXCEPTION
    WHEN NO_DATA_FOUND THEN 
        RETURN 'Aucun';
    WHEN OTHERS THEN 
        RETURN NULL;
END;
/


DECLARE
    v_chef_name VARCHAR2(100);
BEGIN
    v_chef_name := get_chef_name(7902);
    DBMS_OUTPUT.PUT_LINE('Chef name: ' || v_chef_name);
END;
/