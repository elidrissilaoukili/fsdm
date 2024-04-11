DROP TABLE BUDGET_EURO;
CREATE TABLE BUDGET_EURO (
    NUM_OPERATION NUMBER,
    NOM_OPERATION VARCHAR2(100),
    CATEGORIE VARCHAR2(100),
    DATE_OPERATION DATE,
    MONTANT NUMBER
);

DECLARE 
    CURSOR budget_euro_cursor IS
    SELECT NUM_OPERATION, NOM_OPERATION, CATEGORIE, DATE_OPERATION, MONTANT
    FROM BUDGET_EURO
    WHERE DATE_OPERATION >= TO_DATE('01/01/2002', 'DD/MM/YYYY');

    v_num_operation NUMBER := 1;
    v_montant_euro NUMBER;

BEGIN 
    FOR budget_euro_record IN budget_euro_cursor LOOP 
        v_montant_euro := budget_euro_record.MONTANT / 11;

        INSERT INTO
            BUDGET_EURO(NUM_OPERATION, NOM_OPERATION, CATEGORIE, DATE_OPERATION, MONTANT)
        VALUES
            (v_num_operation, budget_euro_record.NOM_OPERATION, budget_euro_record.CATEGORIE, budget_euro_record.DATE_OPERATION, v_montant_euro);

        v_num_operation := v_num_operation + 1;
    END LOOP;

    dbms_output.put_line('Operation completed successful');

EXCEPTION
    WHEN others THEN 
        dbms_output.put_line('Error: ' || SQLERRM);
END;
/