#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <sys/wait.h>
#include <sys/types.h>

int main()
{
     pid_t pid1, pid2, pid_pre;
     int status;
     switch (pid1 = fork())
     {
     case -1:
          perror("fork error");
          break;
     case 0:
          sleep(10);
          execlp("ls", "ls", "-l", NULL);
          break;
          
     default:
          break;
     }

     switch (pid2 = fork())
     {
     case -1:
          perror("fork error");
          break;
     case 0:
          sleep(10);
          execlp("ps", "ps", "-l", NULL);
          break;

     default:
          break;
     }
     pid_pre = wait(&status);
     printf("Premier processor a finir: %d\n", (pid_pre == pid1) ? 1 : 2);

     return 0;
}