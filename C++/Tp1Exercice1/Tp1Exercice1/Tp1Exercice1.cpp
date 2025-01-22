#include <iostream>
#include <cstdlib>
using namespace std;

void trierTab(int* tab, int taille);
void afficherTab(int* tab, int taille);
bool egalite(int tab1[], int tab2[], int taille);
bool egalitePtr(int* tab1, int* tab2, int taille);
int* concatenerTab(int* tab1, int* tab2, int taille);

int main() {
    const int NB_ELEMENTS = 10;
    int tableau1[] = { 22, 44, 12, 61, 4, 99, 33, 17, 15, 123 };
    int tableau2[] = { 22, 33, 44, 61, 4, 99, 12, 17, 123, 15 };
    int tableau3[] = { 22, 44, 12, 61, 4, 99, 33, 17, 15, 123 };

    int* tableau4 = concatenerTab(tableau1, tableau2, NB_ELEMENTS);

    afficherTab(tableau1, NB_ELEMENTS);
    afficherTab(tableau2, NB_ELEMENTS);
    afficherTab(tableau3, NB_ELEMENTS);
    afficherTab(tableau4, NB_ELEMENTS * 2);

    if (egalite(tableau1, tableau2, NB_ELEMENTS)) {
        cout << "les deux tableau 1 et 2 sont egaux" << endl;
    }
    else {
        cout << "les deux tableau 1 et 2 ne sont pas egaux" << endl;
    }

    if (egalite(tableau1, tableau3, NB_ELEMENTS)) {
        cout << "les deux tableau 1 et 3 sont egaux" << endl;
    }
    else {
        cout << "les deux tableau 1 et 3 ne sont pas egaux" << endl;
    }

    if (egalitePtr(tableau1, tableau2, NB_ELEMENTS)) {
        cout << "les deux tableau 1 et 2 sont egaux" << endl;
    }
    else {
        cout << "les deux tableau 1 et 2 ne sont pas egaux" << endl;
    }

    if (egalitePtr(tableau1, tableau3, NB_ELEMENTS)) {
        cout << "les deux tableau 1 et 3 sont egaux" << endl;
    }
    else {
        cout << "les deux tableau 1 et 3 ne sont pas egaux" << endl;
    }

    trierTab(tableau1, NB_ELEMENTS);
    trierTab(tableau2, NB_ELEMENTS);
    trierTab(tableau3, NB_ELEMENTS);
    trierTab(tableau4, NB_ELEMENTS * 2);

    afficherTab(tableau1, NB_ELEMENTS);
    afficherTab(tableau2, NB_ELEMENTS);
    afficherTab(tableau3, NB_ELEMENTS);
    afficherTab(tableau4, NB_ELEMENTS * 2);

    if (egalitePtr(tableau1, tableau2, NB_ELEMENTS)) {
        cout << "les deux tableau 1 et 2 sont egaux" << endl;
    }
    else {
        cout << "les deux tableau 1 et 2 ne sont pas egaux" << endl;
    }

    if (egalitePtr(tableau1, tableau3, NB_ELEMENTS)) {
        cout << "les deux tableau 1 et 3 sont egaux" << endl;
    }
    else {
        cout << "les deux tableau 1 et 3 ne sont pas egaux" << endl;
    }


    free(tableau4);

    return 0;
}

void trierTab(int* tab, int taille) {
    for (int i = 0; i < taille - 1; i++) {
        for (int j = 0; j < taille - i - 1; j++) {
            if (*(tab + j) > *(tab + j + 1)) {
                swap(*(tab + j), *(tab + j + 1));
            }
        }
    }
}

void afficherTab(int* tab, int taille) {
    cout << "tableau contient: ";
    for (int i = 0; i < taille; i++) {
        cout << *(tab + i) << (i < taille - 1 ? ", " : "\n");
    }
}

bool egalite(int tab1[], int tab2[], int taille) {
    for (int i = 0; i < taille; i++) {
        if (tab1[i] != tab2[i]) {
            return false;
        }
    }
    return true;
}

bool egalitePtr(int* tab1, int* tab2, int taille) {
    for (int i = 0; i < taille; i++) {
        if (*(tab1 + i) != *(tab2 + i)) {
            return false;
        }
    }
    return true;
}

int* concatenerTab(int* tab1, int* tab2, int taille) {
    int* tabF = (int*)malloc((taille * 2) * sizeof(int));
    if (tabF == NULL) {
        return NULL; 
    }
    for (int i = 0; i < taille; i++) {
        tabF[i] = tab1[i];        
        tabF[i + taille] = tab2[i]; 
    }
    return tabF;
}
