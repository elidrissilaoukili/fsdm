#pragma once

#include <stdio.h>
#include <stdlib.h>
#include "printTree.h"

#define COUNT 8

typedef struct treenode
{
     int data;
     struct treenode *left;
     struct treenode *right;
     int height;
} treenode;

treenode *newNode(int data)
{
     treenode *node = (treenode *)malloc(sizeof(treenode));
     node->data = data;
     node->left = NULL;
     node->right = NULL;
     node->height = 0;
     return (node);
}

int max(int a, int b)
{
     return (a > b) ? a : b;
}
int height(treenode *root)
{
     if (root == NULL)
          return 0;
     if (root->left != NULL || root->right != NULL)
          return 1 + max(height(root->left), height(root->right));
}

int taille(treenode *root)
{
     if (root == NULL)
          return 0;
     return 1 + taille(root->left) + taille(root->right);
}

treenode *rightRotate(treenode *y)
{
     treenode *x = y->left;
     treenode *T2 = x->right;
     x->right = y;
     y->left = T2;
     y->height = height(y);
     x->height = height(x);
     return x;
}

treenode *leftRotate(treenode *x)
{
     treenode *y = x->right;
     treenode *T2 = y->left;
     y->left = x;
     x->right = T2;
     x->height = height(x);
     y->height = height(y);
     return y;
}

int getBalance(treenode *N)
{
     if (N == NULL)
          return 0;
     return height(N->left) - height(N->right);
}

treenode *insert(treenode *node, int data)
{
     if (node == NULL)
          return (newNode(data));
     if (data < node->data)
          node->left = insert(node->left, data);
     else if (data > node->data)
          node->right = insert(node->right, data);
     else
          return node;
     node->height = height(node);
     int balance = getBalance(node);
     if (balance > 1 && data < node->left->data)
          return rightRotate(node);
     if (balance < -1 && data > node->right->data)
          return leftRotate(node);
     if (balance > 1 && data > node->left->data)
     {
          node->left = leftRotate(node->left);
          return rightRotate(node);
     }
     if (balance < -1 && data < node->right->data)
     {
          node->right = rightRotate(node->right);
          return leftRotate(node);
     }
     return node;
}

#include "printTree.h"

int main()
{
     treenode *root = NULL;

     int array[] = {25, 27, 8, 10, 8, 12, 9, 12};
     int length = sizeof(array) / sizeof(array[0]);
     for (int value = 0; value < length; value++)
          root = insert(root, array[value]);

     printf("Preorder traversal of the constructed AVL"
            " tree is \n");
     printtree(root);

     printf("\nHeight %d", height(root));
     printf("\nsize: %d", taille(root));

     return 0;
}
