/* execls.c exec de ls */

#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <error.h>

int main(void)
{
	execlp("ls", "ls", NULL);
	execlp("lss", "ls", NULL);
	/* erreur : lss inconnu */
	perror("Erreur sur execlp");
	return 0;
}