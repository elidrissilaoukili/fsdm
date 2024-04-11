CREATE OR REPLACE 
    PROCEDURE update_depart_name(depart_number NUMBER, depart_name VARCHAR2) 
    IS 
BEGIN 
    UPDATE dept
    SET dname = depart_name
    WHERE deptno = depart_number;

    COMMIT;

    DBMS_OUTPUT.PUT_LINE('Name updated successfully.');

EXCEPTION
    WHEN NO_DATA_FOUND THEN 
        DBMS_OUTPUT.PUT_LINE('NO depatement has this number.');
    WHEN OTHERS THEN 
        DBMS_OUTPUT.PUT_LINE('ERROR : ' || SQLERRM);

END;
/ 

BEGIN update_depart_name(10, 'Paris');
END;
/