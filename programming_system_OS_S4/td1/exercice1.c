/* Question 1 */
#include <stdio.h>
#include <unistd.h>
main()
{
     fork();
     fork();
     fork();
     printf("PID = %d PPID = %d \n", getpid(), getppid());
     sleep(3);
}
// Exécution : Génération de 8 processus y compris le père

/*Question 2 */
#include <stdio.h>
#include <unistd.h>
main()
{
     execl("/home/SMI4/exo2_2_fork", "exo2_2_fork", NULL);
     fork();
     fork();
     printf("PID = %d PPID = %d \n", getpid(), getppid());
     sleep(3);
}
// Exécution :
// Boucle infinie puisque appel récursif du même programme
// sans aucune condition d’arrêt.

/*Question 3 :*/
#include <stdio.h>
#include <unistd.h>
main()
{
     fork();
     execl("/home/SMI4/exo2_2_fork", "exo2_2_fork", NULL);
     fork();
     printf("PID = %d PPID = %d \n", getpid(), getppid());
     sleep(3);
}
// Exécution :
// Le système se bloque car création un nombre infini de
// processus qui chargera le système.
