// 1) Programme utilise ‘fork’
#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
int main()
{
    pid_t pid;
    int i;
    char c1;
    pid = fork();
    printf("Je vais lancer les 2 fonctions\n");
    if (pid == 0)
    {
        c1 = '*';
        for (i = 1; i <= 200; i++)
            write(1, &c1, 1);
    }
    else
    {
        c1 = '#';
        for (i = 1; i <= 200; i++)
            write(1, &c1, 1);
    }
    return 0;
}
/*
L’exécution de ce programme montre la séquentialité
des traitements effectués : tout d’abord la fonction
etoile() s’exécute entièrement puis la fonction diese()
est lancée et s’exécute à son tour.
*/

// $gcc –o prog_fork_ex7 prog_fork_ex7.c -lpthread
// $ ./prog_fork_ex7

/*
Je vais lancer les 2 fonctions
**********************************************************
**********************************************************
**********************************************************
**************************################################
##########################################################
##########################################################
####################################################
*/
// Cette application n’est donc pas multi-tâche car les
// traitements ne se sont pas effectués en parallèle mais
// l’un après l’autre.

