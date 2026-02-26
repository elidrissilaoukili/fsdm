// indentification.c

#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>

int main(void)
{
	printf("Processor: %d\n", getpid());
	printf("Father pid: %d\n", getppid());
	printf("Size of the pid: %d\n", sizeof(pid_t));

	return 0;
}
