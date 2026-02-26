// termination.c

#include <stdio.h>
#include <stdlib.h>

void quit(void)
{
	printf("We are in the quit() function.\n");
	exit(0);
}

int main(void)
{
	quit();
	printf("We are in the main().\n");
	return 0;
}