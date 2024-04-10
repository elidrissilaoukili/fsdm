-- Question 1


DECLARE


    v_num_operation
NUMBER;


    v_solde NUMBER;


BEGIN


    -- Récupérer le
numéro d'opération le plus élevé dans la table BUDGET


    SELECT
MAX(NUM_OPERATION) INTO v_num_operation FROM BUDGET;


    -- Incrémenter le
numéro d'opération pour le nouvel enregistrement


    v_num_operation :=
v_num_operation + 1;


    -- Récupérer le
solde correspondant au dernier enregistrement


    SELECT SOLDE INTO
v_solde


    FROM BUDGET


    WHERE
NUM_OPERATION = (SELECT MAX(NUM_OPERATION) FROM BUDGET);


    -- Insérer le
nouvel enregistrement avec les valeurs spécifiées


    INSERT INTO BUDGET
(NUM_OPERATION, NOM_OPERATION, CATEGORIE, DATE_OPERATION, MONTANT, SOLDE)


    VALUES
(v_num_operation, 'Courses', 'Depense', TO_DATE('14/01/2002', 'DD/MM/YYYY'),
500, v_solde + 500);


    -- Afficher un
message de confirmation


   
DBMS_OUTPUT.PUT_LINE('Nouvel enregistrement inséré avec succès.');


EXCEPTION


    WHEN OTHERS THEN


       
DBMS_OUTPUT.PUT_LINE('Erreur : ' || SQLERRM);


END;


/


-- Question 2


CREATE TABLE COURSES (


    NUM_OPERATION
NUMBER,


    NOM_OPERATION
VARCHAR2(100),


    CATEGORIE
VARCHAR2(100),


    DATE_OPERATION
DATE,


    MONTANT NUMBER


);


 


 


DECLARE


   CURSOR budget_cursor IS


  SELECT
NUM_OPERATION, NOM_OPERATION, CATEGORIE, DATE_OPERATION, MONTANT


  FROM BUDGET


  WHERE NOM_OPERATION
= 'Courses';


BEGIN


    FOR budget_record
IN budget_cursor LOOP


        INSERT INTO
COURSES (NUM_OPERATION, NOM_OPERATION, CATEGORIE, DATE_OPERATION, MONTANT)


        VALUES
(budget_record.NUM_OPERATION, budget_record.NOM_OPERATION,
budget_record.CATEGORIE, budget_record.DATE_OPERATION, budget_record.MONTANT);


    END LOOP;


 


   
DBMS_OUTPUT.PUT_LINE('Insertion des enregistrements terminée avec
succès.');


EXCEPTION


    WHEN OTHERS THEN


       
DBMS_OUTPUT.PUT_LINE('Erreur : ' || SQLERRM);


END;


/


 


-- Question 3


CREATE TABLE BUDGET_EURO (


    NUM_OPERATION
NUMBER,


    NOM_OPERATION
VARCHAR2(100),


    CATEGORIE
VARCHAR2(100),


    DATE_OPERATION
DATE,


    MONTANT_EURO
NUMBER


);


DECLARE


    CURSOR
budget_cursor IS


        SELECT
NUM_OPERATION, NOM_OPERATION, CATEGORIE, DATE_OPERATION, MONTANT


        FROM BUDGET


        WHERE
DATE_OPERATION >= TO_DATE('01/01/2002', 'DD/MM/YYYY');


    v_num_operation
NUMBER := 1;


    v_montant_euro
NUMBER;


BEGIN


    -- Boucle pour
traiter chaque enregistrement


    FOR budget_record
IN budget_cursor LOOP


        -- Convertir
le montant en euros


        v_montant_euro
:= budget_record.MONTANT / 11;


        -- Insérer
dans la table BUDGET_EURO


        INSERT INTO
BUDGET_EURO (NUM_OPERATION, NOM_OPERATION, CATEGORIE, DATE_OPERATION,
MONTANT_EURO)


        VALUES
(v_num_operation, budget_record.NOM_OPERATION, budget_record.CATEGORIE,
budget_record.DATE_OPERATION, v_montant_euro);


        -- Incrémenter
le numéro d'opération pour le prochain enregistrement


       
v_num_operation := v_num_operation + 1;


    END LOOP;


   
DBMS_OUTPUT.PUT_LINE('Insertion des enregistrements terminée avec
succès.');


EXCEPTION


    WHEN OTHERS THEN


       
DBMS_OUTPUT.PUT_LINE('Erreur : ' || SQLERRM);


END;


/


-- Question 4


Utilisation
d'un curseur paramétré :


CREATE TABLE BUDGET_SEUIL (


    NUM_OPERATION
NUMBER,


    DATE_OPERATION
DATE,


    MONTANT NUMBER


);


 


DECLARE


    v_seuil NUMBER :=
100; -- Seuil saisi par l'utilisateur (vous pouvez le changer selon vos
besoins)


    CURSOR
debit_cursor(p_seuil NUMBER) IS


        SELECT
NUM_OPERATION, DATE_OPERATION, MONTANT


        FROM BUDGET


        WHERE MONTANT
> p_seuil AND CATEGORIE = 'Debit';


BEGIN


    FOR debit_record
IN debit_cursor(v_seuil) LOOP


        INSERT INTO
BUDGET_SEUIL (NUM_OPERATION, DATE_OPERATION, MONTANT)


        VALUES
(debit_record.NUM_OPERATION, debit_record.DATE_OPERATION,
debit_record.MONTANT);


    END LOOP;


   
DBMS_OUTPUT.PUT_LINE('Insertion des enregistrements terminée avec
succès.');


EXCEPTION


    WHEN OTHERS THEN


       
DBMS_OUTPUT.PUT_LINE('Erreur : ' || SQLERRM);


END;


/


Utilisation d'un curseur implicite :


CREATE TABLE BUDGET_SEUIL (


    NUM_OPERATION
NUMBER,


    DATE_OPERATION
DATE,


    MONTANT NUMBER


);


 


DECLARE


    v_seuil NUMBER :=
100; -- Seuil saisi par l'utilisateur (vous pouvez le changer selon vos
besoins)


BEGIN


    FOR debit_record
IN (SELECT NUM_OPERATION, DATE_OPERATION, MONTANT


                        
FROM BUDGET


                        
WHERE MONTANT > v_seuil AND CATEGORIE = 'Debit') LOOP


        INSERT INTO
BUDGET_SEUIL (NUM_OPERATION, DATE_OPERATION, MONTANT)


        VALUES
(debit_record.NUM_OPERATION, debit_record.DATE_OPERATION,
debit_record.MONTANT);


    END LOOP;


 


   
DBMS_OUTPUT.PUT_LINE('Insertion des enregistrements terminée avec
succès.');


EXCEPTION


    WHEN OTHERS THEN


       
DBMS_OUTPUT.PUT_LINE('Erreur : ' || SQLERRM);


END;


/