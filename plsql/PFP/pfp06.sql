CREATE OR REPLACE TRIGGER SAL_EMPLO
BEFORE UPDATE OF sal ON emp
FOR EACH ROW
BEGIN
    IF :NEW.sal <> :OLD.sal THEN
        -- Perform actions here if needed
        NULL; -- Placeholder action
    END IF;
END;
/

CREATE OR REPLACE PROCEDURE increase_sal IS
BEGIN 
    UPDATE emp
    SET sal = sal * 1.10
    WHERE job IN ('CLERK', 'SALESMAN');

    UPDATE emp
    SET sal = sal * 1.15
    WHERE job = 'MANAGER';

    UPDATE emp
    SET sal = sal * 1.20
    WHERE job IN ('ANALYST', 'PRESIDENT');

    COMMIT;
    DBMS_OUTPUT.PUT_LINE('Salaries increased successfully.');

EXCEPTION
    WHEN OTHERS THEN 
        DBMS_OUTPUT.PUT_LINE('ERROR : ' || SQLERRM);
END;
/

BEGIN 
    increase_sal;
END;
/