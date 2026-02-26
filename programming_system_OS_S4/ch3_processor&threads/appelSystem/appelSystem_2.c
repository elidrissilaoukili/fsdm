#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>

int main(void)
{
	char *argv[] = {"vi", "fichier.c", NULL};
	/* dernier élément NULL, obligatoire */
	execv("/usr/bin/vi", argv);
	puts("Problème : cette partie du code ne doit jamais être exécutée");
	return 0;
}