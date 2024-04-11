CREATE OR REPLACE FUNCTION get_depart_name(depart_number NUMBER)
    RETURN VARCHAR2
    IS depart_name VARCHAR2(100);

BEGIN
    SELECT dname INTO depart_name
    FROM dept
    WHERE deptno = depart_number;

    RETURN depart_name;

EXCEPTION
    WHEN NO_DATA_FOUND THEN
        RETURN NULL;
    WHEN OTHERS THEN
        RAISE;
END;
/


SELECT get_nom_departement(20) AS nom_departement
FROM dual;