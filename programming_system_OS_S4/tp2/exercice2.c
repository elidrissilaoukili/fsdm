#include <stdio.h>
#include <unistd.h>
#include <fcntl.h>
#include <sys/types.h>
#include <sys/stat.h>

struct People
{
     char lastN[20];
     char fristN[15];
     int age;
     char phoneN[11];
};

int main()
{

     int fd, i, ret;
     struct People person;
     fd = open("fichnotes.txt", O_RDWR | O_CREAT, S_IRUSR | S_IWUSR);
     if (fd == -1)
          perror("prob open");

     i = 0;
     while (i < 2)
     {
          printf("Enter Last Name: ");
          scanf("%s", person.lastN);
          printf("Enter First Name: ");
          scanf("%s", person.fristN);
          printf("Enter Age: ");
          scanf("%d", &person.age);
          printf("Enter Number Phone: ");
          scanf("%s", person.phoneN);
          write(fd, &person, sizeof(person));
          printf("\n");
          i++;
     }

     ret = lseek(fd, 0, SEEK_SET);
     if (ret == -1)
          perror("lseek problem occured!\n");
     printf("\nThe new position is %d \n", ret);

     i = 0;
     while (i < 2)
     {
          read(fd, &person, sizeof(person));
          printf("\nLast name: %s,\nFirst Name: %s,\nAge %d,\nNumber Phone: %s\n\n", person.lastN, person.fristN, person.age, person.phoneN);
          i++;
     }
     close(fd);
     return 0;
}
