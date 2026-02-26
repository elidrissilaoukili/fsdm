#include <stdio.h>
#include <stdlib.h>

typedef struct Node
{
     int data;
     struct Node *left;
     struct Node *right;
} treenode;

struct Node *newNode(int value)
{
     struct Node *node = (struct Node *)malloc(sizeof(struct Node));
     node->data = value;
     node->left = NULL;
     node->right = NULL;
     return (node);
}

struct Node *insert(struct Node *node, int value)
{
     if (node == NULL)
          return (newNode(value));
     if (value < node->data)
          node->left = insert(node->left, value);
     else if (value > node->data)
          node->right = insert(node->right, value);
     else
          return node;
}

void printtabs(int numbtabs)
{
     for (int i = 0; i < numbtabs; i++)
          printf("\t");
}

void printtree_rec(treenode *root, int level)
{
     if (root == NULL)
     {
          printtabs(level);
          printf("---<empty>---\n");
          return;
     }
     printtabs(level);
     printf("value = %d\n", root->data);
     printtabs(level);
     printf("left\n");

     printtree_rec(root->left, level + 1);
     printtabs(level);
     printf("right\n");

     printtree_rec(root->right, level + 1);
     printtabs(level);
     printf("DONE!\n");
}

void printtree(treenode *root)
{
     printtree_rec(root, 0);
}

int main()
{
     struct Node *root = NULL;

     int array[] = {6, 4, 2, 1, 3, 5, 7, 8};
     int length = sizeof(array) / sizeof(array[0]);
     for (int value = 0; value < length; value++)
          root = insert(root, array[value]);

     /* The tree be like
                10
                  \
                   20
                     \
                     30
                    /  \
                   25  40
                         \
                         50
     */

     printf("Preorder traversal of the constructed AVL"
            " tree is \n");
     printtree(root);

     return 0;
}
