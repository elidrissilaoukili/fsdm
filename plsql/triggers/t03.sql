CREATE SEQUENCE num_etudiant_seq START WITH 10 INCREMENT BY 1 NOCACHE;

CREATE
OR REPLACE TRIGGER auto_increment_num_etudiant BEFORE
INSERT
    -- OF COLUMN NUM_ETUDIANT -- trigger fires BEFORE an INSERT operation, but only if the column NUM_ETUDIANT is being inserted.
    ON Etudiant FOR EACH ROW 

BEGIN 
    :NEW.NUM_ETUDIANT := num_etudiant_seq.NEXTVAL;
END;
/


--  After running the trigger
INSERT INTO ETUDIANT (NOM_ETUDIANT, PRENOM_ETUDIANT, Filiere, AGE)
VALUES ('Mohammed', 'elidrissi', 'SMI', 22);

INSERT INTO ETUDIANT (NOM_ETUDIANT, PRENOM_ETUDIANT, Filiere, AGE)
VALUES ('Mohammed', 'laoukili', 'SOME', 23);

INSERT INTO ETUDIANT (NOM_ETUDIANT, PRENOM_ETUDIANT, Filiere, AGE)
VALUES ('Mohammed', 'something', 'THING', 24);

SELECT * FROM Etudiant;