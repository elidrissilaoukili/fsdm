DROP TABLE BUDGET_SEUIL;
CREATE TABLE BUDGET_SEUIL(
    NUM_OPERATION NUMBER,
    DATE_OPERATION DATE,
    MONTANT NUMBER
);

-- PARAMETRE
DECLARE 
    v_seuil NUMBER := 10;
    
    -- Declare cursor explicitly
    CURSOR debit_cursor IS
        SELECT NUM_OPERATION, DATE_OPERATION, MONTANT
        FROM BUDGET
        WHERE MONTANT > v_seuil AND CATEGORIE = 'Debit';
    
    -- Declare variables to store cursor data
    v_num_operation BUDGET_SEUIL.NUM_OPERATION%TYPE;
    v_date_operation BUDGET_SEUIL.DATE_OPERATION%TYPE;
    v_montant BUDGET_SEUIL.MONTANT%TYPE;
BEGIN
    -- Open cursor
    OPEN debit_cursor;
    
    -- Fetch cursor data into variables
    LOOP
        FETCH debit_cursor INTO v_num_operation, v_date_operation, v_montant;
        EXIT WHEN debit_cursor%NOTFOUND;
        
        -- Insert fetched data into BUDGET_SEUIL table
        INSERT INTO BUDGET_SEUIL(NUM_OPERATION, DATE_OPERATION, MONTANT)
        VALUES (v_num_operation, v_date_operation, v_montant);
    END LOOP;
    
    -- Close cursor
    CLOSE debit_cursor;

    DBMS_OUTPUT.PUT_LINE('INSERTION COMPLETED SUCCESSFUL');   

EXCEPTION 
    WHEN others THEN
        DBMS_OUTPUT.PUT_LINE('ERROR: ' || SQLERRM);
END;
/
