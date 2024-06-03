-- Problème
-- On désire mettre en place un paquetage logiciel permettant de gérer la table 
-- PILOTE (PlNum , PlNom, PlPrenom, Ville, Salaire, NbAnnees)
-- . L’objectif est de disposer de procédures permettant de :
-- •afficher le contenu de la table au format Numéro : Prénom NOM (Ville) – Salaire ;
-- •ajouter un PILOTE ; 	•supprimer un PILOTE (connaissant son numéro) ; •modifier un PILOTE ; ...

-- 1. Donnez la liste des pilotes qui ont assuré plus de 500h de vols [table supplémentaire
-- select p.PlNum, p.PlNom, p.PlPrenom, p.ville, p.salaire
-- from PILOTE p 
-- join vol v on v.PlNum = p.PlNum
-- group by p.PlNum, p.PlNom, p.PlPrenom, p.ville, p.salaire
-- having sum(NbH) > 500;

-- 1. Définir les spécifications d’un paquetage nommé « pilotes_pack » contenant:
-- a. une procédure nommée « afficher » (sans paramètre) permettant d’afficher les pilotes à l’écran au format désiré.
-- b. une procédure nommée « ajouter » permettant d’ajouter dans la table PILOTE un PILOTE dont les numéro, nom, prénom, ville et salaire sont passés en paramètres. Tester la procédure.
-- c. une procédure nommée « supprimer »permettant de supprimer de la table PILOTE un
-- PILOTE dont le numéro est passé en paramètre. Tester la procédure.
-- d. une fonction qui fournit le nombre d'heures de vol pour un PILOTE donné
-- e. Ecrire une fonction PL/SQL permettant de retourner le salaire moyen de tous les employés d’un département donné qui ne sont pas de managers.

CREATE OR REPLACE PACKAGE pilotes_pack AS
	PROCEDURE afficher;
	PROCEDURE ajouter(
		p_PlNum PILOTE.PlNum%type,
		p_PlNom PILOTE.PlNom%type,
		p_PlPrenom PILOTE.PlPrenom%type,
		p_ville PILOTE.ville%type,
		p_salaire PILOTE.salaire%type,
		p_Nbannees PILOTE.NbAnnees%type
	);
	PROCEDURE supprimer(p_PlNum PILOTE.PlNum%type);
	FUNCTION nbr_heures(p_PlNum IN NUMBER) RETURN NUMBER;
	FUNCTION moyen_sal(p_deptno IN NUMBER) RETURN NUMBER;
end pilotes_pack;
/

CREATE OR REPLACE PACKAGE BODY pilotes_pack AS
    PROCEDURE afficher IS
        CURSOR c_pilote IS SELECT * FROM PILOTE; 
    BEGIN 
        FOR c_record IN c_pilote LOOP
            DBMS_OUTPUT.PUT_LINE(
                c_record.PlNum || ': ' ||
                c_record.PlPrenom || ' ' ||
                c_record.PlNom ||
                '(' || c_record.ville || ') - ' || c_record.salaire
            );
        END LOOP;
    END afficher;

    PROCEDURE ajouter(
        p_PlNum PILOTE.PlNum%type,
        p_PlNom PILOTE.PlNom%type,
        p_PlPrenom PILOTE.PlPrenom%type,
        p_ville PILOTE.ville%type,
        p_salaire PILOTE.salaire%type,
        p_Nbannees PILOTE.NbAnnees%type) IS
    BEGIN
        INSERT INTO PILOTE (PlNum, PlNom, PlPrenom, ville, salaire, NbAnnees)
        VALUES (p_PlNum, p_PlNom, p_PlPrenom, p_ville, p_salaire, p_Nbannees);
    END ajouter;

    PROCEDURE supprimer(p_PlNum PILOTE.PlNum%type) IS
    BEGIN
        DELETE FROM PILOTE 
        WHERE PlNum = p_PlNum;
    END supprimer;

    FUNCTION nbr_heures(p_PlNum IN NUMBER) RETURN NUMBER IS 
        nbr_hrs NUMBER;
    BEGIN 
        SELECT SUM(NbH) INTO nbr_hrs FROM vol
        WHERE PlNum = p_PlNum;
        RETURN NVL(nbr_hrs, 0);
    END nbr_heures;

    FUNCTION moyen_sal(p_deptno IN NUMBER) RETURN NUMBER IS
        avr_sal NUMBER;
    BEGIN 
        SELECT AVG(salaire) INTO avr_sal FROM emp
        WHERE deptno = p_deptno AND Job != 'MANAGER';
        RETURN NVL(avr_sal, 0);
    END moyen_sal;

END pilotes_pack;
/

-- test 
SET SERVEROUTPUT on;
BEGIN
	pilotes_pack.afficher;
	-- pilotes_pack.ajouter(20, 'elidrissi', 'mohammed', 'fes', 50000, 3);
	-- pilotes_pack.afficher;
	-- pilotes_pack.supprimer();
	-- pilotes_pack.afficher;

END;
/

-- 2. Créer un trigger qui permet –avant de supprimer un PILOTE- de vérifier si NbAnnees (nb
-- d’années de travail) est supérieur à 7.
CREATE or REPLACE trigger check_ann before delete on PILOTE 
for each row
BEGIN
	IF :OLD.NbAnnees <= 7 THEN
		RAISE_APPLICATION_ERROR(-20001, 'Can not delete a PILOTE under 7 years');
	END IF;
END;
/

-- 3. Créer un trigger qui permet de supprimer tous les vols après suppression d'un PILOTE donné
CREATE OR REPLACE trigger delete_all AFTER DELETE ON PILOTE
for each row
BEGIN
	delete from vol where PlNum = :OLD.PlNum;
END;
/

-- 4. Pour archiver l’historique des opérations de mise à jour de la table PILOTE, on a créé une table History (PlNum, operation_date, operation_type). Ecrire un trigger permettant, après l’exécution de chaque opération sur PILOTE, d’ajouter un tuple concernant cette opération à la table History
CREATE OR REPLACE TRIGGER archive_operations_on_pilote
AFTER INSERT OR UPDATE OR DELETE ON PILOTE
FOR EACH ROW
DECLARE
	v_operation_type VARCHAR2(10);
BEGIN
	IF INSERTING THEN
		v_operation_type := 'INSERT';
		INSERT INTO History (PlNum, operation_date, operation_type)
		VALUES (:NEW.PlNum, SYSDATE, v_operation_type);
	
	ELSIF UPDATING THEN
		v_operation_type := 'UPDATE';
		INSERT INTO History (PlNum, operation_date, operation_type)
		VALUES (:OLD.PlNum, SYSDATE, v_operation_type);
	
	ELSIF DELETING THEN
		v_operation_type := 'DELETE';
		INSERT INTO History (PlNum, operation_date, operation_type)
		VALUES (:OLD.PlNum, SYSDATE, v_operation_type);
	END IF;

EXCEPTION
	WHEN OTHERS THEN
	DBMS_OUTPUT.PUT_LINE('Error: ' || SQLERRM);
END;
/
