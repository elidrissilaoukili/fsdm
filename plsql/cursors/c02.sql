DROP TABLE COURSES;

CREATE TABLE COURSES(
    NUM_OPERATION NUMBER,
    NOM_OPERATION VARCHAR2(100),
    CATEGORIE VARCHAR2(100),
    DATE_OPERATION DATE,
    MONTANT NUMBER
);

DECLARE 
    CURSOR budget_cursor IS 
    SELECT 
        NUM_OPERATION, NOM_OPERATION, CATEGORIE, DATE_OPERATION, MONTANT
    FROM 
        BUDGET
    WHERE NOM_OPERATION = 'Courses';

BEGIN
    FOR budget_record IN budget_cursor LOOP
        INSERT d 
            COURSES(NUM_OPERATION, NOM_OPERATION, CATEGORIE, DATE_OPERATION, MONTANT)
        VALUES
            (budget_record.NUM_OPERATION, budget_record.NOM_OPERATION, budget_record.CATEGORIE, budget_record.DATE_OPERATION, budget_record.MONTANT);
    END LOOP;

    dbms_output.put_line('Opration completed successful');

EXCEPTION
    WHEN others THEN
        dbms_output.put_line('ERROR: '|| SQLERRM);

END;
/            

