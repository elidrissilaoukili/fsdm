// creationProce.c

#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <sys/types.h>

int main()
{
	pid_t child_pid;
	child_pid = fork();
	if (child_pid == -1)
	{
		printf("Creation faild.\n");
		exit(1);
	}
	if (child_pid == 0)
	{
		printf("We are in the SON:\n");
		printf("Processor pid: %d\n", getpid());
		printf("Father pid (PPID): %d\n\n", getppid());
	}
	else
	{
		printf("We are in the FATHER:\n");
		printf("Processor pid: %d\n", child_pid);
		printf("Father pid (PPID): %d\n", getpid());
		printf("Grantfather's pid: %d\n\n", getppid());
	}
	return 0;
}