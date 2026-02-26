#include <stdio.h>
#include <sys/types.h>
#include <sys/stat.h>
#include <fcntl.h>
#include <unistd.h>

int main(int argc, char *argv[])
{
     int fd;
     char *filename = argv[1];
     fd = open(filename, O_RDONLY);
     printf("Le descripteur %d pointe vers %s\n", fd, filename);
     while (1)
          ;
     return 0;
}
