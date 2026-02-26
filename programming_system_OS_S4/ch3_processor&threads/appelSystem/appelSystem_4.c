#include <unistd.h>
#include <sys/types.h>
#include <stdio.h>

int main()
{
	pid_t pid;
	if ((pid = fork()) < 0)
		perror("fork error");
	else if (pid == 0)
	{
		if (execl("/bin/cat", "cat", "affichez", NULL) < 0)
			perror("execl error");
	}
	return 0;
}