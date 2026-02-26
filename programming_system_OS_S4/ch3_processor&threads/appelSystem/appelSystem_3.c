#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>

int main(void)
{
	/* Tableau de char contenant les arguments (là aucun : le
	nom du
	programme et NULL sont obligatoires) */
	char *arguments[] = {"ps", NULL};
	/* dernier élément NULL, obligatoire */
	execv("/bin/ps", arguments);
	perror("Problème : execv");
	return 0;
}