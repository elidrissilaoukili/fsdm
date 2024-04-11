CREATE OR REPLACE TRIGGER check_new_age
BEFORE UPDATE OF age ON etudiant
REFERENCING OLD AS o NEW AS n
FOR EACH ROW
BEGIN
    IF :n.age <= :o.age THEN
        RAISE_APPLICATION_ERROR(-20001, 'The new age must be greater than the old.');
    END IF;
END;
/


-- CALL THIS AFTER 
UPDATE ETUDIANT
SET age = 25 
WHERE num_etudiant = 123;

SELECT * FROM Etudiant;
    
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

-- The new age must be greater than the old. = Le nouvel âge doit être supérieur à l''ancien.
