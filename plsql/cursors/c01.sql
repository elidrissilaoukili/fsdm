DECLARE
    n_num_operation NUMBER;
    n_solde NUMBER;

BEGIN
    SELECT MAX(NUM_OPERATION) INTO n_num_operation FROM BUDGET;
    n_num_operation := n_num_operation + 1;
    
    SELECT SOLDE INTO n_solde FROM BUDGET
    WHERE NUM_OPERATION = (
        SELECT MAX(NUM_OPERATION) FROM BUDGET
    );

    INSERT INTO 
        BUDGET(NUM_OPERATION, NOM_OPERATION, CATEGORIE, DATE_OPERATION, MONTANT, SOLDE)
    VALUES
        (n_num_operation, 'Courses', 'Depense', TO_DATE('14/01/2002', 'DD/MM/YYYY'), 500, n_solde);

    dbms_output.put_line('Completed successful');

EXCEPTION
    WHEN others THEN
        dbms_output.put_line('ERROR- '||SQLERRM);

END;
/