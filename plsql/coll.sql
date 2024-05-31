create or replace function get_nom_prenom(num_etd number) return varchar2 
is 
    nom_etd varchar2(20);
    prenom_etd varchar2(20);
    prenom_nom varchar2(40); 
begin 
    select nom_etudiant into nom_etd
    from etudiant
    where num_etudiant = num_etd;
    
    select prenom_etudiant into prenom_etd
    from etudiant
    where num_etudiant = num_etd;
    
    prenom_nom := prenom_etd || ' ' || nom_etd;
    return prenom_nom;
end;
/

declare 
    nom varchar2(100); 
begin
    nom := get_nom_prenom(6); 
    dbms_output.put_line('Nom et prenom: ' || nom);
end;
/


create or replace procedure update_filiere(num_etd in number) 
is
    new_filiere varchar2(30);
begin 
    new_filiere := 'SMA';

    update etudiant
    set filiere = new_filiere
    where num_etudiant = num_etd;

    dbms_output.put_line('Update completed.');
exception
    when others then
        dbms_output.put_line('ERROR: ' || SQLERRM);
end;
/

