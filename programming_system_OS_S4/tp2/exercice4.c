#include <stdio.h>
#include <sys/types.h>
#include <sys/stat.h>
#include <fcntl.h>
#include <unistd.h>
#include <dirent.h>

#define MAX_BUF 256

int main(int argc, char **argv)
{
     DIR *dirp;
     struct dirent *dp;
     char buf[MAX_BUF];

     // montrer le répertoire actuel
     getcwd(buf, MAX_BUF);
     printf("Répertoire actuel : %s\n", buf);

     // ouvre le répertoire passé comme argument
     dirp = opendir(argv[1]);
     
     // lit entrée à entrée
     while ((dp = readdir(dirp)) != NULL)
          printf("Le numéro d'inode de l'entrée est %ld et le nom de fichier est %s\n", dp->d_ino, dp->d_name);
     closedir(dirp);
     return 0;
}
