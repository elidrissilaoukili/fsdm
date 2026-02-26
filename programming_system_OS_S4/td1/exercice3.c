#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <sys/wait.h>
#include <sys/types.h>

int main()
{
     pid_t pid;
     pid = fork();

     if (pid == -1)
          printf("Processoe creation failed!\n");
     if (pid == 0)
     {
          printf("I'm the son, my pid: %d\n", getpid());
          printf("My father's pid: %d\n", getppid());
          execlp("/bin/ls", "ls", "-l", "/", NULL);
     }
     else
     {
          printf("I'm the father, my pid: %d\n", getpid());
          printf("My son's pid: %d\n", pid);
     }

     return 0;
}