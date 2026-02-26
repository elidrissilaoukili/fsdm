// Le programme affiche : fd2 = 3 (errno = 0).

// Les descripteurs sont choisis par ordre croissant parmi
// les descripteurs libres. Le premier alloué pour fich1.txt
// est 3 (0, 1, 2 sont occupés par stdin, stdout  et stderr),
// puis il est libéré par close et réalloué pour fich2.txt.

// Si fich2 n’existe pas : fd2 = -1 (errno = 2)

// Soit fich1.txt existe ou non : errno est écrasé.
