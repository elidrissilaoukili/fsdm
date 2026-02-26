/*execmenu.c menu de test de exec */
#include <stdio.h>
#include <stdlib.h> //exit
#include <unistd.h> //execlp

int menu()
{
    printf("1 – éditer avec vi \n");
    printf("2 – afficher le fichier \n");
    printf("3 – détruire le fichier \n");
    printf("\nVotre choix? ");

    int choix;
    scanf("%d", &choix);
    return choix;
}

int main(int argc, char *argv[])
{
    if (argc != 2)
    {
        printf("Usage: %s <fichier - à - traiter>\n", argv[0]);
        exit(1);
    }
    char *fichier = argv[1];
    switch (menu())
    {
    case 1:
        execlp("vi", "vi", fichier, NULL); // execlp et fin
        break;
    case 2:
        execlp("cat", "cat", fichier, NULL);
        break;
    case 3:
        execlp("rm", "rm", "- i", fichier, NULL);
        break;
    }
    printf("Fin du programme \n"); // écrit uniquement en cas d’erreur
    return 0;
}
