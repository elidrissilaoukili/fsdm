// creationSonFather.c

#include <stdlib.h>
#include <stdio.h>
#include <unistd.h>
#include <sys/types.h>

int main()
{
	pid_t pid_fils;
	pid_fils = fork();
	switch (pid_fils)
	{
	case (-1):
		printf("Creation faild.\n ");
		break;
	case (0):
		// sleep(20);
		printf("Child's PID: %d. and its FATHER (PPID): %d\n", getpid(), getppid());
		break;
	default:
		// sleep(20)
		printf("FATHER's PID: %d. and its GRANTPARENT's PPID: %d \n", getpid(), getppid());
	}
	return 0;
}