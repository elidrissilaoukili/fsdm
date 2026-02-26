#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <pthread.h>

int i, n;

void *display_integers()
{
     for (i = 1; i <= n; i++)
     {
          printf("%d\n", i);
     }
}

void *sum()
{
     int sum = 0;
     for (i = 1; i < n; i++)
     {
          sum = sum + 1;
     }
     printf("Sum is %d\n", sum);
}

int main()
{
     pthread_t thrDisplay, thrSum;

     printf("Enter n: ");
     scanf("%d", &n);

     printf("I'd created and launched 2 threads.\n");
     pthread_create(&thrDisplay, NULL, display_integers, NULL);
     pthread_create(&thrSum, NULL, sum, NULL);

     printf("I'm waiting for the end of the 2 threads.\n");
     pthread_join(thrDisplay, NULL);
     pthread_join(thrSum, NULL);

     printf("Both threads are terminated.\n");
     printf("End of main thread.\n");

     pthread_exit(NULL);

     return 0;
}