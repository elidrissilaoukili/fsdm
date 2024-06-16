-- database
competition(code_comp, nom_comp);
participant(no_part, nom_part, datenaissance, address, email);
score(no_part, code_comp, no_juge, note);

-- questions
-- 1/ donner le score (note) moyen pour chaque competition
-- 2/ donne la liste des participants ayant un score supérieur a la moyenne des scores pour compitition.
-- 3/ ecrire un bloc plsql qui lit a la console le nom d'une competition et qui affiche les
-- participants avec leur score total 
-- 4/ on considere la table competition, ecrire un declencheur qui verifie avant insertion
-- d'une nouvelle competition que leur nombre ne peut pas depasser 7.
-- 5/ creer un declencheur qui est lance apres chaque nouvelle mise que le scire
-- d'un participant ne peut pas diminuer 
-- 6/ a chaque suppression d'un participant, on souhaite garder une trace dans la table
-- particip_trace(code_part, nom_part, email)
-- 7/ on considere la table competition, ecrire un declencheur qui verifie que le code
-- d'une competition commence par les lettres 'CMP' avant son insertion
-- 8/ ecrire un programme pl/sql qui permet et creer un package contenant:
    -- a. une procedure qui permet de donner le score (note) pour un participant donne
    -- b. une fonction qui retourne le nombre de participant pour une competition donnee
    -- c. une procedure permettant d'obtenir le score maximum pour une competition donnee
    -- d. dans un bloc PLSQL, executer l'appel de la procedure ou fonction du package cree
-- correction exam
-- 1/ donner le score (note) moyen pour chaque competition
select AVG(s.note) 
from score s
join competition c on s.code_comp = c.code_comp
group by c.code_comp;

-- 2/ donne la liste des participants ayant un score supérieur a la moyenne des scores pour compitition.
select p.no_part, p.nom_part 
from participant p
join score s on s.no_part = p.no_part

join(
    select code_comp, AVG(note) as avg_score
    from score
    group by code_comp
) as avg_scores ON s.code_comp = avg_scores.code_comp
where s.note > avg_scores.avg_score;

-- 3/ ecrire un bloc plsql qui lit a la console le nom d'une competition et qui affiche les
-- participants avec leur score total 
declare
    v_compt_nom competition.nom_comp%type;
    v_count number;
begin
    -- read
    dbms_output.put('Enter the name: ');
    dbms_output.get_line(v_compt_nom);

    -- get count of participants
    select count(*) into v_count
    from score s
    join competition c on s.code_comp = c.code_comp;
    where c.nom_comp = v_compt_nom;

    -- check if participant count exceeds 7
    if v_count > 7 then
        dbms_output.put_line('participant number > 7');
    else
        -- display participant
        for rec in (
            select p.no_part, p.nom_part
            from participant p
            join score s on s.no_part=p.no_part
            join competition c on s.code_comp = c.code_comp
            where c.nom_comp = v_compt_nom;
        )
        loop 
            dbms_output.put_line('Participant number: ' || rec.no_part || ', Name: ' || rec.nom_part);
        end loop;
    end if;
EXCEPTION
    WHEN NO_DATA_FOUND THEN
        DBMS_OUTPUT.PUT_LINE('Competition not found.');
end;
/

-- 4/