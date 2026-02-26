#include <stdio.h>
#include <unistd.h>

int main()
{
    int i;
    for (i = 0; i < 10; i++)
        if (fork() == 0)
            for (i = 0; i < 10; i++)
                printf("%d", i);

    return 0;
}