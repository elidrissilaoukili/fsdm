// synchronisation.c                                                                                                 1 ⨯

#include <unistd.h>
#include <stdlib.h>
#include <stdio.h>
#include <sys/wait.h> /* Pour wait() */
#include <errno.h>	  /* permet de récupérer les codes d'erreur */

int main(void)
{
	pid_t child_pid;
	int status;
	switch (child_pid = fork())
	{
	case -1:
		perror("Problem in fork()\n");
		exit(errno); /* retour du code d'erreur */
		break;
	case 0:
		puts("I am the son!");
		puts("I return code 3.");
		exit(3);
	default:
		puts("I am the father");
		puts("I get the return code");
		wait(&status);
		printf("Son Exit Code %d : %d\n", child_pid, WEXITSTATUS(status));
	}
	return 0;
}