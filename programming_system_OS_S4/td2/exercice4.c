#include <stdio.h>
#include <sys/types.h>
#include <sys/stat.h>
#include <fcntl.h>
#include <unistd.h>

int main()
{
     int j, fd;
     char ch[6];
     fd = open("fichier.txt", O_RDONLY);
     printf("fd value at opening, %d\n", fd);
     for (j = 0; j < 4; j++)
     {
          read(fd, ch, 6);
          printf("hello : %s \n", ch);
     }
     close(fd);
}