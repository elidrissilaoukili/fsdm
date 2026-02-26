// arguments.c

#include <stdio.h>
#include <stdlib.h>
int main(int argc, char *argv[])
{
	int i;
	if (argc == 1)
		printf("The program received no arguments.\n");
	if (argc >= 2)
	{
		printf("The program received the following arguments: \n");
		for (i = 1; i < argc; i++)
			printf("Argument %d = %s\n", i, argv[i]);
	}
	return 0;
}