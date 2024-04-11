CREATE OR REPLACE TRIGGER check_new_sal
BEFORE UPDATE OF sal ON emp
REFERENCING OLD AS o NEW AS n
FOR EACH ROW

BEGIN
    IF :n.sal <= :o.sal THEN
        RAISE_APPLICATION_ERROR(-20001, 'The new salary must be greater than the old one.');
    END IF;
END;
/
