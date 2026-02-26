#include <unistd.h>
#include <stdlib.h>
#include <stdio.h>
#include <pthread.h>

int i;

void addition()
{
	i = i + 10;
	printf("hello, thread fils %d\n", i);
	i = i + 20;
	printf("hello, thread fils %d\n", i);
}

int main()
{
	pthread_t num_thread;
	i = 0;
	if (pthread_create(&num_thread, NULL, (void *(*)())addition, NULL) == -1)
		perror("pb pthread_create \n");
	i = i + 1000;
	printf("hello, thread principal %d\n", i);
	i = i + 2000;
	printf("hello, thread principal %d\n", i);
	pthread_join(num_thread, NULL);
}
