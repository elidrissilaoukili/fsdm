// processorLaunched.c

#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <sys/types.h>

int main(void)
{
	int p1, p2;
	p1 = fork();
	p2 = fork();

	printf("p1: %d\n", p1);
	printf("p2: %d\n", p2);

	return 0;
}