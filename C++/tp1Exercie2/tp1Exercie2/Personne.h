#pragma once
#ifndef _classePersonne_H
#define _classePersonne_H
#include <iostream>
#include <string>
#include <sstream>
using namespace std;

#include "Date.h"

class Personne {
protected:
    string nom;
    string prenom;
    char sexe;
    Date naissance;
public:
    Personne(string nom, string prenom, char sexe);

    friend istream& operator>>(istream& is, Personne& personne);
    friend ostream& operator<<(ostream& os, const Personne& personne); 
};

#endif
