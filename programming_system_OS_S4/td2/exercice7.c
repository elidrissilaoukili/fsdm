#include <stdio.h>
#include <stdlib.h>
#include <fcntl.h>
#include <sys/types.h>
#include <sys/stat.h>
#include <unistd.h>

int main(int argc, char *argv[])
{
     int s = 0, i;
     char buf[255];
     FILE *f = fopen(argv[1], "r");
     if (f == NULL)
     {
          fprintf(stderr, "impossible d’ouvrir le fichier en lecture\n");
          exit(1);
     }
     while (!feof(f))
     {
          fgets(buf, 255, f);    // ou bien remplacer par      fscanf(f,"%s",buf);
          sscanf(buf, "%d", &i); // ou bien remplacer par   i=atoi(buf);
          s += i;
          printf(" %s \n", buf); // pour l'affichage du contenu du fichier
     }
     printf("La somme est %d \n", s);
     fclose(f);
     return 0;
}
