#include <unistd.h>	 // pour sleep
#include <pthread.h> // pthread_create , pthread_join , pthread_exit
#include <stdio.h>

void *fonction(void *arg)
{
	printf("pid du thread fils = %d\n", (int)getpid());
	while (1)
		;
	return NULL;
}
int main()
{
	pthread_t thread1;
	printf("pid de main = %d\n", (int)getpid());
	pthread_create(&thread1, NULL, &fonction, NULL);
	while (1)
		;
	return 0;
}