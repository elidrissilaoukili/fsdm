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