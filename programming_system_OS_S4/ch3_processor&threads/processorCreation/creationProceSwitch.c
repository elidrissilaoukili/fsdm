// creationProceSwitch.c

#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <sys/types.h>

int main()
{
	pid_t child_pid;
	child_pid = fork();
	switch (child_pid)
	{
	case -1:
	{
		printf("Creation faild.\n");
		exit(1);
		break;
	}
	case 0:
	{
		printf("We are in the SON:\n");
		printf("Processor pid: %d\n", getpid());
		printf("Father pid (PPID): %d\n\n", getppid());
		break;
	}
	default:
	{
		printf("We are in the FATHER:\n");
		printf("Processor pid: %d\n", child_pid);
		printf("Father pid (PID): %d\n", getpid());
		printf("Grantfather's (PPID): %d\n\n", getppid());
		break;
	}
	}

	return 0;
}