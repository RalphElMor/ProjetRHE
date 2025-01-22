#pragma once
#pragma once
#ifndef _classeEmploye_H
#define _classeEmploye_H

#include <iostream>
#include <string>
#include "Personne.h"
#include "Date.h"

using namespace std;

class Employe : public Personne {
private:
    string poste;
    double salaire;
    Date dateEmbauche;

public:

    Employe();

    Employe(string nom, string prenom, char sexe, string poste, double salaire, Date dateEmbauche);

    friend istream& operator>>(istream& is, Employe& employe);
    friend ostream& operator<<(ostream& os, const Employe& employe);
};
#endif