#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>
#include <limits.h>

typedef struct Nodetree
{
     int data, height;
     struct Nodetree *left;
     struct Nodetree *right;
} tree;

tree *create_node(int value)
{
     tree *node = (tree *)malloc(sizeof(tree));
     node->data = value;
     node->left = NULL;
     node->right = NULL;
     node->height = 0;
     return node;
}

int max(int a, int b)
{
     return (a > b) ? a : b;
}

int height(tree *node)
{
     if (node == NULL)
          return 0;
     return 1 + max(height(node->left), height(node->right));
}

int getBalance(tree *node)
{
     if (node == NULL)
          return 0;
     return height(node->left) - height(node->right);
}

tree *rightRotate(tree *y)
{
     tree *x = y->left;
     tree *T2 = x->right;

     x->right = y;
     y->left = T2;

     y->height = height(y);
     x->height = height(x);
     return x;
}

tree *leftRotate(tree *x)
{
     tree *y = x->right;
     tree *T2 = y->left;

     y->left = x;
     x->right = T2;

     x->height = height(x);
     y->height = height(y);
     return y;
}

tree *insert(tree *node, int value)
{
     if (node == NULL)
          return create_node(value);
     if (value < node->data)
          node->left = insert(node->left, value);
     if (value > node->data)
          node->right = insert(node->right, value);
     else
          return node;

     node->height = height(node);
     int balance = getBalance(node);

     // AVL tree
     // left left case
     if (balance > 1 && value < node->left->data)
          return rightRotate(node);
     // right right case
     if (balance < -1 && value > node->right->data)
          return leftRotate(node);
     // left right case
     if (balance > 1 && value > node->left->data)
     {
          node->left = leftRotate(node->left);
          return rightRotate(node);
     }
     // right left case
     if (balance < -1 && value < node->right->data)
     {
          node->right = rightRotate(node->right);
          return leftRotate(node);
     }
     return node;
}

// display the tree in preoder way
void printtabs(int numbtabs)
{
     for (int i = 0; i < numbtabs; i++)
          printf("\t");
}

void printtree_rec(tree *root, int level)
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

void printtree(tree *root)
{
     printtree_rec(root, 0);
}
void preorder(tree *root)
{
     if (root != NULL)
     {
          printf("%d ", root->data);
          preorder(root->left);
          preorder(root->right);
     }
}

bool find_x(tree *root, int x)
{
     if (root == NULL)
          return false;
     if (x == root->data)
          return true;
     if (x < root->data)
          return find_x(root->left, x);
     else
          return find_x(root->right, x);
}

int findMax(tree *node)
{
     if (node == NULL)
          return INT_MIN;
     int res = node->data;
     int lres = findMax(node->left);
     int rres = findMax(node->right);
     if (lres > res)
          res = lres;
     if (rres > res)
          res = rres;
     return res;
}

int findMin(tree *node)
{
     if (node == NULL)
          return INT_MAX;
     int res = node->data;
     int lres = findMin(node->left);
     int rres = findMin(node->right);
     if (lres < res)
          res = lres;
     if (rres < res)
          res = rres;
     return res;
}

int main()
{
     tree *root = NULL;
     int array[] = {10, 20, 40, 30, 15, 45, 50, 2};
     int length = sizeof(array) / sizeof(array[0]);
     for (int value = 0; value < length; value++)
          root = insert(root, array[value]);

     printf("Height of the tree is: \t%d\n", root->height);

     int x = 10;
     find_x(root, x);
     if (find_x(root, x) == true)
          printf("Number is on the tree\n");
     else
          printf("Not in the tree\n");

     int max = findMax(root);
     int min = findMin(root);
     printf("Max is %d\n", max);
     printf("Min is %d\n\n", min);

     printf("The tree in preorder: \n");
     printtree(root);
}