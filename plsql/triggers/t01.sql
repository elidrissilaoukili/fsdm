CREATE OR REPLACE TRIGGER check_new_age
BEFORE UPDATE OF age ON etudiant
REFERENCING OLD AS o NEW AS n
FOR EACH ROW
BEGIN
    IF :n.age <= :o.age THEN
        RAISE_APPLICATION_ERROR(-20001, 'Le nouvel âge doit être supérieur à l''ancien.');
    END IF;
END;
/


-- APPEL
-- UPDATE ETUDIANT
-- SET age = 25 
-- WHERE num_etudiant = 123;

-- CREATE OR REPLACE TRIGGER check_new_age
-- BEFORE UPDATE OF age ON etudiant
-- REFERENCING OLD AS o NEW AS n
-- FOR EACH ROW
-- BEGIN
--     IF :n.age <= :o.age THEN
--         RAISE_APPLICATION_ERROR(-20001, 'Le nouvel âge doit être supérieur à l''ancien.');
--     END IF;
-- END;
-- /


