DROP TABLE BUDGET_SEUIL;
CREATE TABLE BUDGET_SEUIL(
    NUM_OPERATION NUMBER,
    DATE_OPERATION DATE,
    MONTANT NUMBER
);

-- PARAMETER
DECLARE 
    v_seuil NUMBER := 10;
    
    -- Declare cursor explicitly
    CURSOR debit_cursor IS
        SELECT NUM_OPERATION, DATE_OPERATION, MONTANT
        FROM BUDGET
        WHERE MONTANT > v_seuil AND CATEGORIE = 'Debit';

BEGIN
    -- Loop through records fetched by the cursor
    FOR debit_rec IN debit_cursor
    LOOP
        -- Insert fetched data into BUDGET_SEUIL table
        INSERT INTO BUDGET_SEUIL(NUM_OPERATION, DATE_OPERATION, MONTANT)
        VALUES (debit_rec.NUM_OPERATION, debit_rec.DATE_OPERATION, debit_rec.MONTANT);
    END LOOP;

    DBMS_OUTPUT.PUT_LINE('INSERTION COMPLETED SUCCESSFULLY');   

EXCEPTION 
    WHEN others THEN
        DBMS_OUTPUT.PUT_LINE('ERROR: ' || SQLERRM);
END;
/
