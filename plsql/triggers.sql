
-- Question 01
CREATE OR REPLACE TRIGGER check_new_age
BEFORE UPDATE OF age ON etudiant
FOR EACH ROW
BEGIN
    IF :NEW.age <= :OLD.age THEN
        RAISE_APPLICATION_ERROR(-20001, 'Le nouvel âge doit être supérieur à ancien.');
    END IF;
END;
/

Appel:
UPDATE ETUDIANT
SET age = 22
WHERE num_etudiant = 2;
SELECT * FROM Etudiant;

-- Question 02
CREATE OR REPLACE TRIGGER check_new_sal
BEFORE UPDATE OF sal ON emp
FOR EACH ROW
BEGIN
    IF :NEW.sal <= :OLD.sal THEN
        RAISE_APPLICATION_ERROR(-20001, 'Le nouveau salaire doit être supérieur à lancien.');
    END IF;
END;
/


-- Question 03
CREATE SEQUENCE num_etudiant_seq
START WITH 10
INCREMENT BY 1
NOCACHE;

CREATE OR REPLACE TRIGGER auto_increment_num_etudiant
BEFORE INSERT ON Etudiant
FOR EACH ROW
BEGIN
    :NEW.NUM_ETUDIANT := num_etudiant_seq.NEXTVAL;
END;
/
-- Appel
INSERT INTO Etudiant (nom, prenom, ...) VALUES ('John', 'Doe', ...);
INSERT INTO ETUDIANT VALUES (99, 'ETUDIANT_99', 'ETUDIANT_99', 'HOWAHOWA', 55);
SELECT * FROM Etudiant;

-- Question 04
CREATE OR REPLACE TRIGGER update_stock_commande
BEFORE INSERT ON Commande
FOR EACH ROW
DECLARE
    stock_actuel NUMBER;
BEGIN
    -- Obtenir la quantité en stock actuelle du produit
    SELECT stock INTO stock_actuel
    FROM produit
    WHERE no_prod = :NEW.no_prod;

    -- Vérifier si le stock est suffisant pour la nouvelle commande
    IF stock_actuel < :NEW.quantite THEN
        -- Lever une erreur si le stock est insuffisant
        RAISE_APPLICATION_ERROR(-20001, 'Stock insuffisant pour cette commande.');
    ELSE
        -- Mettre à jour la quantité en stock après l'insertion de la commande
        UPDATE produit
        SET stock = stock - :NEW.quantite
        WHERE no_prod = :NEW.no_prod;
    END IF;
END;
/


-- Question 05
ALTER TABLE ETUDIANT DISABLE ALL TRIGGERS;
ALTER TABLE ETUDIANT ENABLE ALL TRIGGERS;


-- Question 06
ALTER TRIGGER Trigger_SMI DISABLE;
ALTER TRIGGER Trigger_SMI ENABLE;