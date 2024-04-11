DROP TABLE BUDGET_SEUIL;
CREATE TABLE BUDGET_SEUIL(
    NUM_OPERATION NUMBER,
    DATE_OPERATION DATE,
    MONTANT NUMBER
);

-- IMPLICIT
DECLARE
    v_seuil NUMBER := &v_seuil;
    
BEGIN
    FOR debit_record IN (
        SELECT NUM_OPERATION, DATE_OPERATION, MONTANT
        FROM BUDGET
        WHERE MONTANT > v_seuil AND CATEGORIE = 'Debit'
    ) LOOP

        INSERT INTO 
            BUDGET_SEUIL(NUM_OPERATION, DATE_OPERATION, MONTANT)
        VALUES
            (debit_record.NUM_OPERATION, debit_record.DATE_OPERATION, debit_record.MONTANT);

    END LOOP;

    DBMS_OUTPUT.PUT_LINE('Insertion completed successfully');

EXCEPTION
    WHEN others THEN   
    DBMS_OUTPUT.PUT_LINE('Error : ' || SQLERRM);

END;
/