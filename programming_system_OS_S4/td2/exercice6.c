#include <sys/stat.h>
#include <stdio.h>
#include <fcntl.h>
#include <stdlib.h>
#include <stdio.h>
int main(int argc, char *argv[])
{
     struct stat buf;
     mode_t mode;
     char c;
     int result;
     result = stat(argv[1], &buf);
     if (result == -1)
          printf("Infos sur %s non disponibles\n", argv[1]);
     else
     {
          mode = buf.st_mode;
          if (S_ISDIR(mode))
          {
               c = 'd';
               printf("%s est un répertoire", argv[1]);
          }
          else if (S_ISREG(mode))
          {
               c = '-';
               printf("%s est un fichier ordinaire\n", argv[1]);
          }
          else if (S_ISFIFO(mode))
          {
               c = 'p';
               printf("%s est un pipe", argv[1]);
          }
          else
               printf("%s est un autre type", argv[1]);
          printf("Droits d'accès                 :");
          printf("%c", c);
          printf("%c", mode & S_IRUSR ? 'r' : '-');
          printf("%c", mode & S_IRUSR ? 'w' : '-');
          printf("%c", mode & S_IXUSR ? 'x' : '-');
          printf("%c", mode & S_IRGRP ? 'r' : '-');
          printf("%c", mode & S_IWGRP ? 'w' : '-');
          printf("%c", mode & S_IXGRP ? 'x' : '-');
          printf("%c", mode & S_IROTH ? 'r' : '-');
          printf("%c", mode & S_IWOTH ? 'w' : '-');
          printf("%c", mode & S_IXOTH ? 'x' : '-');
          printf("\n");
     }
     return 0;
}
