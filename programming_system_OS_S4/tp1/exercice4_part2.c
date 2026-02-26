// 2) Création de deux threads
#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <pthread.h>

void *etoile(void *inutilise)
{
    int i;
    char c1 = '*';
    for (i = 1; i <= 200; i++)
        write(1, &c1, 1); // écrit un caractère sur stdout (descripteur 1)
}
void *diese(void *inutilise)
{
    int i;
    char c1 = '#';
    for (i = 1; i <= 200; i++)
        write(1, &c1, 1);
}
int main(void)
{
    pthread_t thrEtoile, thrDiese; // les ID des de 2 threads
    
    printf("Je vais creer et lancer 2 threads\n");
    pthread_create(&thrEtoile, NULL, etoile, NULL);
    pthread_create(&thrDiese, NULL, diese, NULL);
    
    printf("J’attends la fin des 2 threads\n");
    pthread_join(thrEtoile, NULL);
    pthread_join(thrDiese, NULL);
    
    printf("\nLes 2 threads se sont termines\n");
    printf("Fin du thread principal\n");
    pthread_exit(NULL);
    return 0;
}
/*
L’exécution de ce programme montre la parallélisation des
traitements effectués : la fonction etoile() s’exécute en
parallèle avec la fonction diese(). */

// $ ./prog_thr_ex7
// Je vais creer et lancer 2 threads

/*
*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#
*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#
*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#
*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#
*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#
*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#
*#*#*#*#*#*#*###########*#*#*#*****#*#*#*#*#*#******
Les 2 threads se sont termines
Fin du thread principal
*/
